<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{


    



    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:25',
            'message' => 'required|max:500',
            'file' => 'nullable|file|mimes:jpeg,png,pdf',
        ]);
        $lastApplication = DB::table('applications')
            ->where('user_id', auth()->id())
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->first();
        if ($lastApplication) {
            $timeDiff = Carbon::now()->diffInMinutes($lastApplication->created_at);
            $timeRemaining = 1440 - $timeDiff;

            if ($timeRemaining > 0) {
                return redirect()->back()->withErrors(['error' => "Sizning ariza yuborishingiz uchun $timeRemaining sekund qoldi."]);
            }
        }
        $file_url = null;
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $file_url = $request->file('file')->storeAs('files', $name, 'public');
        }


        $application = Application::create([
            'user_id' => auth()->user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $file_url
        ]);


        //$manager = User::first();
        //Mail::to($manager)->send(new ApplicationCreated($application));

        return redirect()->back()->with('success', 'Ariza muvaffaqiyatli yuborildi!');
    }


}
