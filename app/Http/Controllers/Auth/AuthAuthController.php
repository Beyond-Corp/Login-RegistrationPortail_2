<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\User;

class AuthAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function registration(){
        return view('auth.registration');
    }







    public function postRegistration(Request $request){
       // dd($request->all());

       $request->validate([
        'name'=>'required',
        'email' => 'required|email|unique:users',
        'password'=>'required|min:6',
       ]);
       $data = $request->all();
       $createUser= $this->create($data);
       return redirect('index')->withSuccess('Your are registered successfully');

    }

    public function create(array $data){
        return User :: create([
         'name' => $data['name'],
         'email' => $data['email'],
         'password' => $data['password'],
        ]);
    }
















    public function postLogin(Request $request){
        //dd($request->all);

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password'=>'required|min:6',
           ]);

           $checkLoginCredential =$request->only('email','password');

           if(Auth::attempt($checkLoginCredential)){
            return redirect('general.dashboard')->withSuccess('Your are successfully log in ' );
              }else{
                return redirect('index')->withSuccess('eroor in your email or password'); 
           }

    }

    public function logout(){

        Session::flush(); //  est appelé pour vider toutes les variables de session.
        Auth::logout(); // est utilisé pour déconnecter l'utilisateur
       redirect('auth.login'); // est utilisé pour rediriger l'utilisateur vers la page de connexion
   }



   public function dashboard(){
    if(Auth::check()){
        return view('general.dashboard');
    }
    return redirect('index')->withSuccess('You are not allowed to access');
 }
}