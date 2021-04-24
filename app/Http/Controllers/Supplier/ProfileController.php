<?php

namespace App\Http\Controllers\Supplier;

use App\Buyer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
