<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/posts';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        /*$user = Socialite::driver('github')->user();
        dd($user);*/
          // $user->token;

         try {

            $user = Socialite::driver('github')->user();

        } catch (Exception $e) {

            return Redirect::to('auth/github');

        }

        $authUser = $this->findOrCreateUser($user);

        auth()->login($authUser, true);

        return redirect('/posts');

    }
     private function findOrCreateUser($githubUser){

        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;

        }
        
        return User::create([
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password'=>$githubUser->token,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar
        ]);
}


public function redirectToProvider2(){

   return Socialite::driver('google')->redirect();
    /*dd($user);
    checkUser($user);*/

}
/*function checkUser($socialUser){
    $existUser = User::where('email',$socialUser->email)->first();
    if(!$existUser){
            $user= User::create([
            'googleName' => $socialUser->nickname,
            'googleEmail' => $socialUser->email,
            'Googlepassword'=>$socialUser->token,
            'google_id' => $socialUser->id,
        ]);
        return $user;
    }
    return $existUser;

}*/

public function handleProviderCallback2(){
   /* $user = Socialite::driver('google')->user();*/

    try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('google_id',$googleUser->id)->first();
            //dd($existUser);
            

            if($existUser) { 
               
               return $existUser;
            } else {
            $user = new User; 
            $user->googleName = $googleUser->name;
            $user->googleEmail = $googleUser->email;
            $user->google_id = $googleUser->id; 
            $user->Googlepassword = md5(rand(1,10000));
            $user->save(); 
            //auth()->loginUsingId($user->google_id);
            }
            return redirect('/posts');
        }
        catch (Exception $e) {
            return 'error';
        }
    }
}


