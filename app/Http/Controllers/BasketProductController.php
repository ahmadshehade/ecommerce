<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\BasketProduct;
use Illuminate\Http\Request;

class BasketProductController extends Controller
{
    public function index(){
        $user=auth('web')->user();
        $basket=$user->profile->basket;
        $items=BasketProduct::all();
        return  view('Basket_Product_view.index',compact(['user','basket','items']));

    }
    //
    public function removeItem($id1)
    {

        $item=BasketProduct::where('product_id',$id1)->first();

        if (!$item) {
            return redirect()->back()->with('error', 'No Product in Your Basket');
        }
        $user = auth('web')->user();
        $basket = $user->profile->basket;

        if (!$basket) {
            return redirect()->back()->with('error', 'No Basket');
        }


        $item->delete();
        $basket->mony += $item->product_price;
        $basket->element_count -= 1;
        $basket->save();

        $product1 = Product::where('id',$id1)->first();
        $product1->amount += 1;
        $product1->save();

        return redirect()->route('allItems',['id'=>$user->id])->with('success', 'Successfully Returned ' . $product1->name);
    }
}
