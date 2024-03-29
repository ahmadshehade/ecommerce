<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
     return $this->middleware('userAuth')->only(['showProfile','createProfile','storeprofile','editProfile','updateProfile','deleteProfile']);
    }

    public function createRegister(){
        return view('users_view.register');
    }
   //RegisterUser
   public function storeUser(Request $request){
    $validate=Validator::make($request->all(),[
        'name'=>['required','string',Rule::unique('users')->ignore('id')],
        'email'=>['required','email',Rule::unique('users')->ignore('id')],
         'password'=>['required'],
         'password_confirmation' => ['required']
    ]);
    if($validate->fails()){
        return view('welcome')->with('error',$validate->errors());
    }else{
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->back();
    }
   }
   //showlogin
   public function pagelogin(){
    return view('users_view.loginuser');
    }

   //loginUser
   public function loginUser(Request $request){
    $products = Product::orderBy('id')->paginate(6);
    $validate=Validator::make($request->all(),[

        'email'=>['required','email'],
         'password'=>['required'],
    ]);
    if($validate->fails()){
        return view('users_view.loginuser')->with('error',$validate->errors());
    }else{
         $cardinate=$request->only(['email','password']);
         if(auth()->guard('web')->attempt($cardinate)){
            $user=auth('web')->user();
            return redirect()->route('allproduct')->with('user',$user)->with('products',$products);
         }else{
            return redirect()->back()->with('error','No Cardiante');
         }

    }
   }
   //userLOgout
   public function logoutUser(){
    $user=auth('web')->user();
    if(!$user){
        return redirect()->back()->with('error','No user Login');
    }else{
        auth('web')->logout();
        return redirect()->route('pagelogin')->with('success','Successfully Logout User');
    }
   }
   //
   ////////////profile
   public  function  showProfile($id){
    $user=auth()->guard('web')->user();
    $profile=profile::where('user_id',$id)->first();
    if(!$profile){
        return redirect()->back()->with('error','No Found Profile');
    }else{
        return view('users_view.showprofile')->with('profile',$profile)->with('user',$user);
    }

   }
   //create
   public function createProfile(Request $request){

      return view('users_view.createprofile');
   }
   //
   public function storeprofile(Request $request){
    $cardinate=  [
        'age'=>['required','integer','min:18'],
        'country'=>['required','string'],
        'gender'=>['required','string','min:4','max:7'],
        'photo'=>['required','image'],
        'number'=>['required','integer',Rule::unique('profiles')->ignore('id')]
    ];
    $validate =Validator::make($request->all(),$cardinate,);
    if($validate->fails()){
        return redirect()->back()->with('error',$validate->errors());
    }else{
        $user=auth('web')->user();
        $photo=$request->file('photo');
        $newphoto=time().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('profile_Images'),$newphoto);
        Profile::create([
            'age'=>$request->age,
            'country'=>$request->country,
            'gender'=>$request->gender,
            'photo' => 'profile_Images/' . $newphoto,
            'number'=>$request->number,
            'name'=>$user->name,
            'user_id'=>$user->id

        ]);
        return redirect()->route('showprofile',['id'=>$user->id])->with('success','Successfully Create Your Profile');
    }
   }
   //
   ///editprofile
   public function editProfile($id){
    $profile=Profile::where('user_id',$id)->first();
    return view('users_view.editprofile')->with('profile',$profile);
   }
   //
   public function updateProfile(Request $request,$id){
    $cardinate=  [
        'age'=>['required','integer','min:18'],
        'country'=>['required','string'],
        'gender'=>['required','string','min:4','max:7'],
        'number'=>['required','integer'],

    ];
    $validate =Validator::make($request->all(),$cardinate);
    if($validate->fails()){
        return redirect()->back()->with('error',$validate->errors());
    }else{
        $profile=Profile::where('user_id',$id)->first();
        if(!$profile){
            return redirect()->back()->with('error','No Profile Found');
        }else{
            if($request->hasFile('photo')){
            if(File::exists($profile->photo)){
                File::delete($profile->photo);
            }
            $id=auth('web')->user()->id;
            $photo=$request->file('photo');
            $newphoto=time().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('profile_Images'),$newphoto);
            $profile->update([
                'age'=>$request->age,
                'country'=>$request->country,
                'gender'=>$request->gender,
                 'photo'=>'profile_Images/'.$newphoto,
                'number'=>$request->number,
                'name'=>$request->name,

            ]);
        }else{
            $profile->update([
                'age'=>$request->age,
                'country'=>$request->country,
                'gender'=>$request->gender,
                'number'=>$request->number,
                'name'=>$request->name,

                 ]);
            }
        }
        return redirect()->route('showprofile',['id'=>$id])->with('sucess','Successfully Update Profile');
    }

   }
   //delete profile
   public function deleteProfile(){
    $user=auth('web')->user();
    $profile=profile::where('user_id',$user->id)->first();
    if(!$profile){
        return redirect()->back()->with('error','No Profile For :'.$user->name);
    }else{
        file::delete($profile->photo);
        $profile->delete();
        return redirect()->route('allproduct')->with('success','Successfully Deleted Your Profile');
    }
   }

}
