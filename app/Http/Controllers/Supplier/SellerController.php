<?php

namespace App\Http\Controllers\Supplier;

use App\Buyer;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Seller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public  function index(){
        return view('supplier.seller.index');
    }
    public  function  create(){
        return view('supplier.seller.create');
    }
    public  function  store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|nullable|required|string',
            'status_id' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'seller_address'=>'required|string|max:255',
            'seller_website'=>'required|string|max:255',
            'seller_passport'=>'sometimes|nullable|string|max:255',
            'seller_nid'=>'required|string|max:255',
            'passport_expire_date'=>'sometimes|nullable|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'sr_name' => 'required|string|max:255',
            'sr_email' => 'required|string|max:255',
            'sr_phone' => 'required|string|max:255',
            'sr_image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $image=$request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(270,270)->save('image_seller/user/'.$name_gen);
        $img_url=$name_gen;

        $sr_image=$request->file('sr_image');
        $name_gen=hexdec(uniqid()).'.'.$sr_image->getClientOriginalExtension();
        Image::make($sr_image)->resize(600,600)->save('image_seller/user/'.$name_gen);
        $img_url2=$name_gen;

        $user=new User();
        $seller_id=Helper::IDGenerator(new User,'seller_id',3,'SELLER');
        $user->seller_id =$seller_id;
        $user -> name = $request -> name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'seller';
        $user->image = $img_url;
        $user->password=bcrypt($request->password);
        $user->save();
        $seller=new Seller();
        $seller->seller_id=$seller_id;
        $seller->seller_name=$request->name;
        $seller->seller_address=$request->seller_address;
        $seller->seller_website=$request->seller_website;
        $seller->seller_telephone=$request->phone;
        $seller->seller_email=$request->email;
        $seller->seller_passport=$request->seller_passport;
        $seller->seller_nid=$request->seller_nid;
        $seller->passport_expire_date=$request->passport_expire_date;
        $seller->user_id=$user->id;
        $seller->image=$img_url;
        $seller->sr_image=$img_url2;
        $seller->br_name=$request->br_name;
        $seller->br_phone=$request->br_phone;
        $seller->br_email=$request->br_email;
        $seller->save();
        Session::flash('success','Seller Created  successfully!!');
        return redirect()->route('supplier.buyer.index');




    }
}
