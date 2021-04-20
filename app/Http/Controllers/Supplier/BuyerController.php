<?php

namespace App\Http\Controllers\Supplier;

use App\Buyer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use PHPUnit\TextUI\Help;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Image;

class BuyerController extends Controller
{
    public  function index(){
        return view('supplier.buyer.index');
    }
    public  function  create(){
        return view('supplier.buyer.create');
    }
    public  function  store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'sometimes|nullable|required|numeric',
            'status_id' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'buyer_address'=>'required|string|max:255',
            'buyer_website	'=>'required|string|max:255',
            'buyer_passport	'=>'sometimes|nullable|string|max:255',
            'buyer_nid	'=>'required|string|max:255',
            'passport_expire_date	'=>'sometimes|nullable|string|max:255',
            'buyer_type	'=>'required|string|max:255',
            'expire_date	'=>'sometimes|nullable|string|max:255',
            'trade_license' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'buyer_logo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'tagline' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'br_name' => 'sometimes|nullable|string|max:255',
            'br_email' => 'sometimes|nullable|string|max:255',
            'br_phone' => 'sometimes|nullable|string|max:255',
            'br_image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $image=$request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(270,270)->save('image_buyer/user/'.$name_gen);
        $img_url=$name_gen;

        $trade_license=$request->file('trade_license');
        $name_gen=hexdec(uniqid()).'.'.$trade_license->getClientOriginalExtension();
        Image::make($trade_license)->resize(600,600)->save('image_buyer/user/'.$name_gen);
        $img_url2=$name_gen;

        $buyer_logo=$request->file('buyer_logo');
        $name_gen=hexdec(uniqid()).'.'.$buyer_logo->getClientOriginalExtension();
        Image::make($buyer_logo)->resize(250,250)->save('image_buyer/user/'.$name_gen);
        $img_url3=$name_gen;

        $br_image=$request->file('br_image');
        $name_gen=hexdec(uniqid()).'.'.$br_image->getClientOriginalExtension();
        Image::make($br_image)->resize(250,250)->save('image_buyer/user/'.$name_gen);
        $img_url4=$name_gen;


        $user=new User();
        $buyer_id=Helper::IDGenerator(new User,'buyer_id',3,'BUYER');
        $user->buyer_id=$buyer_id;
        $user -> name = $request -> name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'buyer';
        $user->image=$img_url;
        $user->password=bcrypt($request->password);
        $user->save();
        $buyer=new Buyer();
        $buyer->buyer_id=$buyer_id;
        $buyer->buyer_name=$request->name;
        $buyer->buyer_address=$request->buyer_address;
        $buyer->buyer_website=$request->buyer_website;
        $buyer->buyer_telephone=$request->phone;
        $buyer->buyer_email=$request->email;
        $buyer->buyer_passport=$request->buyer_passport;
        $buyer->buyer_nid=$request->buyer_nid;
        $buyer->passport_expire_date=$request->passport_expire_date;
        $buyer->buyer_type=$request->buyer_type;
        $buyer->expire_date=$request->expire_date;
        $buyer->tagline=$request->tagline;
        $buyer->user_id=Auth::user()->id;
        $buyer->trade_license=$img_url2;
        $buyer->buyer_logo=$img_url3;
        $buyer->br_iamge=$img_url4;
        $buyer->save();
        Session::flash('success','Buyer Created  successfully!!');
        return redirect()->back();






    }
}
