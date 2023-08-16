<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

     public function welcome():View
    {
        //
        return view('welcome');
    
    }

    


    public function register():View
    {
        //
        return view('register');
    
    }

    public function index():View
    {
        //
        return view('recherche');
    
    }

    public function store(Request $request):RedirectResponse
    {
        //

        //dd(Request()->all());

          $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            "password" => ['required','string','min:3'],
            
       ]);

        //Create New user

          if($fields){

               $user = User::create([
                     'name' => $fields["name"],
                     'email' => $fields['email'],
                     'password' => Hash::make($fields['password']),

      ]);
          

         return redirect()->route('welcome');

       }
    }


     public function login(Request $request):RedirectResponse
    {
        //
       // dd($request->all());
         $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('index');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    
    }



     public function logout(Request $request):RedirectResponse
    {
        //
      // dd(Request()->all());
        Auth::logout();
 
       $request->session()->invalidate();
 
        $request->session()->regenerateToken();

         return redirect('/login');
    
    }





}
