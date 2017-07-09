<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;

class LoginController extends Controller
{
    public function index() {
    	if(Session::has('user')){
    		return redirect()->route('home');
    	}else{
    		return view('admin.login');
    	}
    }
    
    public function Authenticate(Request $r) {
    	
	    $user = User::where('username',$r->input('username'))->get()->first();
	    if($user){
		    $password = $user->password;
		    $givenPassword = $r->input('password');
		    if(Hash::check($givenPassword,$password)){
		    	$r->session()->put('user',$user);
		    	return redirect()->route('home');
		    }else{
		    	$perror = "Password incorrect!";
				$r->session()->put('pError',$perror);
		    	return back()->withInput();
		    }
		}else{
			$unerror = "Username incorrect!";
			$r->session()->put('unError',$unerror);
			return back()->withInput();
		}
    }

    public function home() {
    	if(Session::has('user')){
			return view('admin.dashboard');
		}else{
			return redirect()->route('index');
		}
    }

    public function register() {
    	$password = Hash::make('malik1994');
    	$username = 'osama94';
    	$data = array('name' => 'Osama',
    				  'email' => 'shahzaib407150@hotmail.co.uk' ,
    				  'username' => $username ,
    				  'password' => $password 
    				  );
    	$find = User::where('username',$username)->first();
    	if($find) {
    		echo 'User Already Exists';
    	}else{
	    	$create = User::create($data);
	    	if($create){
	    		echo "User Created Succesfully!";
	    	}else{
	    		echo 'Fail!';
	    	}
	    }
    }

    public function logout(Request $r) {
    	$r->session()->flush('user');
    	return redirect()->route('index');
    }

    public function reset(Request $r){
        $email = $r->input('email');
        $data = User::where('email',$email)->get()->first();
        if($data){
            Session::put('ee','true');
            Session::put('email',$email);
            return redirect()->route('index');
        }else{
            Session::put('ee','Email not Exist');
            return redirect()->route('index');
        }
    }

    public function newPass(Request $r){
        $email =  $r->input('email');
        $password = $r->input('password');
        $new = array('password' => Hash::make($password));
        $pass = User::where('email',$email)->update($new);
        if($pass){
            Session::flash('passUpdated','Password Updated Successfully!');
            Session::forget('ee');
            Session::forget('email');
            return redirect()->route('index');
        }else{
            Session::flash('passUpdated','Password Change Request Fails!');
            Session::forget('ee');
            Session::forget('email');
            return redirect()->route('index');
        }
    }
}
