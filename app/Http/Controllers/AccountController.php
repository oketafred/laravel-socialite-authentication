<?php

namespace App\Http\Controllers;

use Session;
use Sentinel;
use Validator;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class AccountController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'    => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                Session::flash('error', 'All Fields are Required!');
                return redirect()->back();
            }

            if (Sentinel::authenticate($request->all())) {
                return redirect()->route('dashboard');
            } else {
                Session::flash('error', 'Wrong Credentials!');
                return redirect()->back();
            }
        } catch (ThrottlingException $ex) {
            $delay = round($ex->getDelay() / 60, 0);
            Session::flash('error', "You have been locked out. For $delay minutes");
            return redirect()->back();
        } catch (NotActivatedException $ex) {
            Session::flash('error', 'Your account has been deactivated, Please contact the Administrator.');
            return redirect()->back();
        }
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email'        => 'required|unique:users',
            'password'     => 'required|confirmed',
            'full_name'    => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'All Fields are Required!');
            return redirect()->back();
        }
        $credentials = [
            'email'        => $request->email,
            'password'     => $request->password,
            'full_name'    => $request->full_name,
        ];
        $user = Sentinel::registerAndActivate($credentials);
        Session::flash('success', 'User registration successful');
        return redirect()->route('login');
    }

    public function logout()
    {
        $user = Sentinel::getUser();
        Sentinel::logout($user);
        return redirect('/');
    }
}
