<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Illuminate\Support\MessageBag;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        //$this->middleware('guest:admin')->except('logout');
    }    
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    protected function guard(){
        return Auth::guard('admin');
    }
    
    public function logout() {
        //logout user
        auth()->logout();
        
        // redirect to homepage
        return redirect('/admin/login');
    }
    
    public function login(Request $request) {
        $errors = new MessageBag; // initiate MessageBag
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email'     =>  $request->email,
            'password'  => $request->password 
          ];

        if (Auth::guard('admin')->attempt($credentials, $request->get('remember'))) {
            $user = Admin::where('email', $request->email)->first();
            if ($user && $user->active == 1) {                
                return redirect()->intended('/admin/products');                
            }            
            else
            {
                $errors = new MessageBag(['password' => ['Your account is suspended. Please contact Admin to activate your account.']]);        
                return back()->withErrors($errors)->withInput($request->only('email', 'remember'));
            }
        }
        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);                        
        return back()->withErrors($errors)->withInput($request->only('email', 'remember'));
    }
        /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Load user from database
        $user = Admin::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
            $errors = [$this->username() => trans('auth.notactivated')];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
