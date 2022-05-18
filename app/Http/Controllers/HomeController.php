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
        $user = auth()->user();
        $usernamearray = explode(" ", $user->name);
        $lastnamearray = explode(" ", $usernamearray[1]);
        $lastname=$lastnamearray[0];
        $lastnamefirstCharacter = substr($lastname, 0, 1);

        return view('dashboard',['name' => $usernamearray[0] . " " .$lastnamefirstCharacter]);
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

    /**
     * show user profile edit page
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editUser($id)
    {
        $userid = User::find($id);

        return view('edit',compact($userid));
    }

    /**
     * user profile updation
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateuser()
    {
        $userid  = Auth::user()->id;
        $user = User::find($userid);
        $user->update([
            'name' => request('name')
        ]);

        return redirect()->route('web.dashboard')->with('status','Profile updated');

    }

}
