<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
 /**
 * Where to redirect admins after login.
 *
 * @var string
 */
 protected $redirectTo = '/admin';
 /**
 * Create a new controller instance.
 *
 * @return void
 */
 public function __construct()
 {
 $this->middleware('guest:admin')->except('logout');
 }
 /**
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
public function showLoginForm()
{
    return view('dashboard.page-login');
}

public function index()
{
    return view('dashboard.index');
}

public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password,
        'role' => 2,
        'status' => 1,
        ], $request->get('remember'))) {
            return redirect()->intended(route('admin.index'));
        }
        elseif (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 3,
            'status' => 1,
            ], $request->get('remember'))) {
                return redirect()->intended(route('admin.indexDH'));
            }
        elseif (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 4,
                'status' => 1,
                ], $request->get('remember'))) {
                    return redirect()->intended(route('admin.indexCL'));
                }
        elseif (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 5,
                'status' => 1,
                ], $request->get('remember'))) {
                    return redirect()->intended(route('admin.indexWH'));
                }
        elseif (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 6,
            'status' => 1,
            ], $request->get('remember'))) {
                return redirect()->intended(route('admin.sale'));
            }
        return redirect()->back()->with("error","Login Failed");
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}