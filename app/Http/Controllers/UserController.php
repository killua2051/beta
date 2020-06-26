<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class UserController extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function checklogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:8'
		]);

		$user_data = array(
			'email' => $request->get('email'),
			'password' => $request->get('password')
		);

		if(Auth::attempt($user_data))
		{
			return redirect('successlogin');
		}
		else
		{
			return back()->with('error', 'Wrong Login Details');
		}
	}

	public function successlogin()
	{
		//return view('successlogin');
        if(Auth::user()->status == 2)
        {
            //return redirect('change_request_list');
            return redirect('main');
        }
        elseif(Auth::user()->status == 1)
        {
            return redirect('request_forms');
        }
        elseif(Auth::user()->status == 3)
        {
            return redirect('quality_assurance');
        }
        elseif(Auth::user()->status == 4)
        {
            return redirect('request_list');
        }
	 elseif(Auth::user()->status == 5)
        {
            return redirect('request_forms');
        }
        if(Auth::user()->view1 ==1 );
        return redirect('creation_list');
	}

	public function logout()
	{
		Auth::logout();
		return redirect('/');
	}
}


?>