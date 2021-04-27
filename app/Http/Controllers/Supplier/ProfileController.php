<?php

namespace App\Http\Controllers\Supplier;

use App\Buyer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;

class ProfileController extends Controller
{
    public  function  index(){
        $user=User::findOrFail(Auth::user()->id);
        return view('supplier.profile.index',compact('user'));

    }
    public  function edit(){
        $user=User::findOrFail(Auth::user()->id);
       return view('supplier.profile.edit',compact('user'));

    }
    public  function  update(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'phone' => 'sometimes|nullable|numeric',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png|required|max:10000',
            'password' => 'sometimes|nullable|confirmed|min:8',

        ]);
        if($request->has('password')){
            $data['password'] = bcrypt($data['password']);
        }

        $path = 'users/'.$user->image;
        if(($request->has('image'))){
        if($user->image == 'defaultphoto.png'){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('users/'.$name_gen);
            $data['image'] = $name_gen;
        }
        else{
           
            unlink($path);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('users/'.$name_gen);
            $data['image'] = $name_gen;
        }
        }
        $user->update($data);

        Session::flash('success','Profile Updated successfully!');
        return redirect()->route('supplier.profile.index');

    }
}
