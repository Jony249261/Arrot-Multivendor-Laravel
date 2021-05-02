<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('parent_id',auth()->user()->id)->latest()->paginate(15);
        return view('buyer.user.index',compact('users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyer.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'sometimes|nullable|numeric',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png|required|max:10000',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|string',
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['parent_id'] = auth()->user()->id;
        $data['buyer_id'] = auth()->user()->buyer_id;

        if($request->has('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('users/'.$name_gen);
            $data['image'] = $name_gen;
        }
        User::create($data);

        Session::flash('success','Buyer user created successfully!');
        return redirect()->route('buyer-users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user->is_verified == 0){
            $user->is_verified = 1;
        }
        else{
            $user->is_verified = 0;
        }
        $user->save();
        Session::flash('info','User status has been changed!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('buyer.user.edit',compact('user'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public  function  update_user(Request  $request,$id){
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'phone' => 'sometimes|nullable|numeric',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png|required|max:10000',
            'password' => 'sometimes|nullable|confirmed|min:6',
            'role' => 'required|string'
        ]);
        $path = 'users/'.$user->image;
        $user->parent_id= auth()->user()->id;
        $user->buyer_id= auth()->user()->buyer_id;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->role=$request->role;

        if($request->has('image')){
            if(file_exists(public_path($path))){
                unlink($path);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('users/'.$name_gen);
            $img_url = $name_gen;

        }
        if ($request->has('image')){
            $user->image=$img_url;
        }


        if (!empty($request->password)){
            $user->password=bcrypt($request->password);
        }
        $user->update();

        Session::flash('success','Suport user Updated successfully!');
        return redirect()->route('buyer-users.index');
    }
}
