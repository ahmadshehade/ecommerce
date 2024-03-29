<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
class AdminController extends Controller
{
    //showloginadmin
    public function showloginAdmin(){
        return view('admins_view.showlogin');
    }

    //lodinadmin
    public function loginAdmin(Request $request){
        $products = Product::orderBy('id')->paginate(6);
        $validate=Validator::make($request->all(),[

            'email'=>['required','email'],
             'password'=>['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors());
        }else{
            $cardenate=$request->only(['email','password']);
            if(auth('admin_web')->attempt($cardenate)){
            $admin=auth()->guard('admin_web')->user();
            $admin->status=1;
            $admin->save();
            return redirect()->route('allproduct')->with('admin',$admin)->with('products',$products);
            }else{

                return redirect()->back()->with('error','No Cardiante');

            }

        }
    }
    //logoutAdmin
    public function logoutAdmin(){
        if(auth()->guard('admin_web')->check() && auth()->guard('admin_web')->user()){
            auth()->guard('admin_web')->user()->status=0;
            auth()->guard('admin_web')->user()->save();
            auth()->guard('admin_web')->logout();
            return redirect()->route('pagelogin')->with('success','Successfully logout admin ');
        }else{
            return redirect()->back()->with('error','No found Admin');
        }

    }
}
