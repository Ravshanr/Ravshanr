<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login'); 
    }

    public function create()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);
    
        // Parolni xeshlash
        $validated['password'] = bcrypt($validated['password']);
    
        // Foydalanuvchini yaratish
        $user = User::create($validated);
    
        // Foydalanuvchini avtomatik login qilish
        auth()->login($user);
    
        return redirect('/');
    }
    
    public function store(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

   if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role->name === 'manager') {
            return redirect()->route('manager');


        } elseif ($user->role->name === 'client') {
            return redirect()->route('client'); 
        }
    }

    return back()->withErrors([
        'email' => 'Login yoki parol xato.',
    ]);
}
public function manager()
{
    $applications = Application::latest()->paginate(5);
    $totalApplications = Application::count();

    return view('manager', [
        'applications' => $applications,
        'totalApplications' => $totalApplications,
    ]);
}

public function client()
{
    $user = Auth::user();
    $applications = Application::where('user_id', $user->id)->latest()->paginate(5);
    return view('client', [
        'applications'   => $applications,
        'user'           => $user,
    ]);
}
public function destroy(Application $application)
{
    // Ariza faylini o'chirish
    if ($application->file_url) {
        Storage::disk('public')->delete($application->file_url);
    }

    // Arizaga bog'liq javoblarni o'chirish
    $application->answers()->delete();

    // Arizani o'chirish
    $application->delete();

    // Foydalanuvchini tizimdan chiqish
    Auth::logout();

    // Foydalanuvchini login sahifasiga yo'naltirish
    return redirect()->route('login')->with('success', 'Siz tizimdan chiqdingiz.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Siz tizimdan chiqdingiz.');
    }



}
   