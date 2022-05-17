<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display Homepage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view('welcome');
    }

    /**
     * Show Login Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Login the user and redirect to Dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $email = strtolower($request->input('email'));
        $password = $request->input('password');
        $remember = $request->input('remember');
        $user = User::where('email', $email)->first();

        if (!empty($user)) {

            if(!Hash::check($password, $user->password)) {
                return back()->with('error', 'Sorry, Invalid password.');
            }

            if(Auth::attempt(['email' => $email, 'password' => $password], $remember)){
               $dashboardUrl = route('web.dashboard');
               return redirect($dashboardUrl)->with('status', "Login successful");
            }

        }

        return back()->with('error', 'Sorry, Invalid email or password.');
    }

    /**
     * Show Register page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Show dashboard
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dashboard()
    {
        /** @var User|null $user */
        $user = auth()->user();

        if (empty($user)) {
            $loginUrl = route('web.login.show');
            return redirect($loginUrl);
        }

        return view('dashboard',['name' => $user->name]);
    }

    /**
     * Register the user and redirect to Login page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $email = strtolower($request->input('email'));

        $userExists = User::where('email', $email)->exists();

        if ($userExists) {
            return back()->with('error', 'Sorry, An account already exists with same email. Please login.');
        }

        $user = User::create([
            'name'      => ucwords($request->input('name')),
            'email'     => $email,
            'password'  => bcrypt($request->input('password')),
        ]);

        $loginUrl = route('web.login.show');

        return redirect($loginUrl)->with('status', "Registration successful. Please login.");
    }

    /**
     * Logout the login user.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        auth()->logout();
        $loginUrl = route('web.login.show');

        return redirect($loginUrl);
    }

}
