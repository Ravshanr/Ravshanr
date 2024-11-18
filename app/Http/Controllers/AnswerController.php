<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnswerController extends Controller
{
    public function create(Application $application,Request $request)
    {
        return view('answers.create',['application'=>$application]);
    }

    public function store(Application $application, Request $request)
    {
        $request->validate(['body' => 'required|max:255']);
    
        $application->answer()->create([
            'body' => $request->body,
        ]);
    
        return redirect()->route('manager')->with('success', 'Javob muvaffaqiyatli yuborildi!');
    }

    public function edit(Application $application)
{
    $answer = $application->answer;

    if ($answer) {  
        return view('answers.edit', compact('application','answer'));
    }
    return redirect()->back()->with('error', 'Answer not found.');
}

public function update(Application $application, Request $request)
{

    $request->validate([
        'body' => 'required|string|max:255',
    ]);
    $answer = $application->answer;

    if ($answer) {
        $answer->update([
            'body' => $request->input('body'),
        ]);
    }
    return redirect()->route('manager')->with('success', 'Javob muvaffaqiyatli yangilandi');
}


public function destroy(Application $application)
{
    if ($application->file_url) {
        Storage::disk('public')->delete($application->file_url);
    }
    if($application->answer()){
        $application->answer()->delete();
    }
    $application->delete();

    return redirect()->route('manager')->with('success', 'Ariza muvaffaqiyatli o‘chirildi.');
}


}
