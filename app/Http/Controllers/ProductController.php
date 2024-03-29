<?php
namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\BasketProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('AdminAuth')->only(['create','store','edit','update','delete']);
    }
    //

    public function index(){
        $products = Product::orderBy('id')->paginate(6);

        return view('users_view.products')->with('products',$products);
    }
    ////////
    public function create(){
        return view('products_view.create');
    }
///////////////////////////
    public function store(Request $request){
        $cardinate=[
            'name'=>['required','string',Rule::unique('products')->ignore('id')],
            'price'=>['required','integer'],
            'description'=>['required'],
            'image' => ['required', 'image'],
            'amount'=>['required','integer'],

        ];
        $validate=Validator::make($request->all(),$cardinate);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors());
        }else{
            $photo=$request->file('image');
            $newphoto=time().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('products_image'),$newphoto);
            Product::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
                'image'=>'products_image/'.$newphoto,
                'amount'=>$request->amount,
            ]);
          return redirect()->route('allproduct');
        }
    }
    //
    public function show($id){
        $product=Product::where('id',$id)->first();
        if(!$product){
            return redirect()->back()->with('error','No Product');
        }else{
            return view('products_view.show')->with('product',$product);
        }
    }
    //
    public function edit($id){
        $product=Product::where('id',$id)->first();
        if(!$product){
            return redirect()->back()->with('error','No Product');
        }else{
           return view('products_view.edit')->with('product',$product);
        }
    }
    //
    public function update(Request $request,$id){
        $cardinate=[
            'name'=>['required','string'],
            'price'=>['required','integer'],
            'description'=>['required'],
            'amount'=>['required','integer'],


        ];
        $validate=Validator::make($request->all(),$cardinate);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors());
        }else{
         $product=Product::where('id',$id)->first();
         if(!$product){
            return redirect()->back()->with('error','no Product');
         }
        if($request->hasFile('iamge')){
           if(File::exists($product->image)){
            File::delete($product->image);
           }
           $photo=$request->file('image');
           $newphoto=time().'_'.$photo->getClientOriginalName();
           $photo->move(public_path('products_image'),$newphoto);
           $product->name=$request->name;
           $product->price=$request->price;
           $product->image='products_image/'.$newphoto;
           $product->description=$request->description;
           $product->amount=$request->amount;
          $product->save();

        }else{
            $product->name=$request->name;
            $product->price=$request->price;
            $product->description=$request->description;
            $product->amount=$request->amount;
           $product->save();
        }
        return redirect()->route('allproduct')->with('success','Successfully Upade Product'.$product->name);
        }
    }
    //delete product
    public function delete($id){
        $product=Product::where('id',$id)->first();
        if(!$product){
            return redirect()->back()->with('error','no Product');
         }else{
            File::delete($product->image);
            $product->delete();
            return redirect()->route('allproduct')->with('success','Successfuly Delete Prodact');
         }
    }
    //buy product
    public function buyProducts($id1){
        $user=auth('web')->user();
        $product=Product::where('id',$id1)->first();
        if(!$product){
            return redirect()->back()->with('error','No Product');
        }else{
            $profile=$user->profile;
            if(!$profile){
                return redirect()->back()->with('error','No Profile ');
            }else{
                $basket=$profile->basket;
                if(!$basket){
                    return redirect()->back()->with('error','No Basket pleace Create Basket Before ');
                }else{
                    if($basket->mony<$product->price){
                        return redirect()->back()->with('error','There is not enough money in your wallet '.$basket->mony.'$');
                    }
                    $product->baskets()->attach($basket->id,[
                        'basket_name'=>$basket->name,
                        'product_name'=>$product->name,
                        'product_price'=>$product->price
                    ]);

                    $product->amount=$product->amount-1;
                    $product->save();
                    $basket->element_count=$basket->element_count+1;
                    $basket->mony=$basket->mony-$product->price;
                    $basket->save();

                    return redirect()->route('allproduct')->with('success','Successfully Buy '.$product->name);
                }
            }
        }
    }
    // //
    // public function showcreatevideo(){
    //     return view('vedio_view.showcreate');
    // }
    // ///video
    // public function createvideo(Request $request){
    //     $validate=Validator::make($request->all(),[
    //         'video'=>'required|mimes:mp4,ogx,oga,ogv',
    //     ]);
    //     if($validate->fails()){
    //         return redirect()->back()->with('error',$validate->errors());
    //     }else{
    //         $video=$request->file('video');
    //         $newvideo=time().'_'.$video->getClientOriginalName();
    //         $video->move(public_path('videos/',$newvideo));
    //         $create=new Video();
    //         $create->video='videos/'.$newvideo;
    //         $create->save();
    //         return redirect()->route('allproduct');
    //     }
    // }






}
