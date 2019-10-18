<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile()
    {
    	return view('profile', array('user' => Auth::user()));
    }

    public function postProfile(Request $request)
    {
    	if ($request->hasFile('photo')) {
    		$photo = $request->file('photo');
    		$fileName = time() . '.' . $photo->getClientOriginalExtension();

    		Image::make($photo)->resize(300, 300)->save(public_path($fileName));

            /*Image::make($photo)->resize(300, 300)->save(public_path('photo' .$fileName));*/

    		$user = Auth::user();
    		$user->photo = $fileName;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()));
    }
}
