<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BasketController extends Controller
{

    public function __construct()
    {
      return $this->middleware('basketAuth');
    }
    //
  public function createBasket($id){
    $profile=Profile::where('user_id',$id)->first();
    if(!$profile){
        return redirect()->back()->with('error','No Profile For This User Please Create One ');
    }else{
        return view('baskets_view.create');
    }
  }
    //
    public function storeBasket(Request $request){
        $user=auth('web')->user();
        $profile=Profile::where('user_id',$user->id)->first();
        if(!$profile){
            return redirect()->back()->with('error','No Profile For This User Please Create One ');
        }
        $validate=Validator::make($request->all(),[
          'mony'=>['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error','No Validate');
        }else{
            $basket=new Basket;
            $basket->name=$profile->name;
            $basket->element_count=0;
            $basket->profile_id=$profile->id;
            $basket->mony=$request->mony;
            $basket->save();
            return redirect()->route('showprofile',['id'=>$user->id])->with('success','successfully Create Basket For'.$profile->name);
        }
    }
    //
    public function showBasket(){
             $user=auth('web')->user();
             $profile=$user->profile;
            $basket=$profile->basket;
             if(!$basket){
            return redirect()->route('showprofile',['id'=>auth('web')->user->id])->with('error','No found Basket');

        }else{
            return view('baskets_view.show')->with('success','Successfully Showed Basket')->with('basket',$basket)->with('user',$user);
        }
    }
    //edit
    public function editBasket(){
        $user=auth('web')->user();
        $profile=$user->profile;
        $basket=$profile->basket;
        return view('baskets_view.edit')->with('basket',$basket)->with('user',$user);
    }
    //update
    public function updateBasket(Request $request){

        $validate=Validator::make($request->all(),[
            'mony'=>['required'],
          ]);
          if($validate->fails()){
              return redirect()->back()->with('error','No Validate');
          }else{
            $user=auth('web')->user();
            $profile=$user->profile;
            $basket=$profile->basket;
           $basket->mony=$request->mony;
           $basket->save();

            return redirect()->route('showBasket',['id'=>$user->id])->with('success','Successgully Update Mony In The Basket :');
          }
        }
        //delete
        public function deleteBasket(){
            $user=auth('web')->user();
            $profile=$user->profile;
            $basket=$profile->basket;
            if(!$basket){
                return redirect()->back()->with('error','No Basket To Profile :'.$profile->name);
            }
            $basket->delete();
            return  redirect()->route('showprofile',['id'=>$user->id])->with('sucess','Successfully Deleted Basket')->with('user',$user);
        }
}
