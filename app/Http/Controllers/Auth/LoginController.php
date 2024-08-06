<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;
use Session;


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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
    public function logout(){
        Auth::guard('web')->logout();
        Session::flush();
        return redirect()->route('login');
    }


    public function login()
    {
        
        return view('auth.login');
    }

    public function Post_login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = trim($request->Input('email'));
        $pass = trim($request->Input('password'));

        if (Auth::attempt(['email' => $user, 'password' => $pass])) {
            $user = auth()->user();
            // $locale = $user->language->language_code;
            // App::setLocale($locale);
            // Session::put('locale', $locale);

            

            // $this->redirectTo();
            // $url = $this->redirectTo();
            return redirect('/admin/dashboard');
        } else {
            Session::flash('fails', ' Incorrect email or password..!');
            return back();
        }
    }
}
