<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\LoginAdminRequest;
use Session;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(LoginAdminRequest $request)
    {
        $data = $request->only(['email', 'password']);

        $check_login = Auth::attempt($data);

        if ($check_login == false) 
        {
            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu !');
        } 
        elseif (Auth::user()->role == 0) 
        {
            return redirect()->back()->with('error', 'Bạn không đủ quyền vào trang này !');
        } 
        elseif (Auth::user()->status != 1) 
        {
            return redirect()->back()->with('error', 'Tài khoản của bạn đã bị khoá !');
        } 
        else {
            return redirect()->route('admin');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('admin.login');
    }
}
