<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_catagory(){
        $data=catagory::all();
        return view('admin.catagory', compact('data'));
    }

    public function add_catagory(request $request){
        $data=new catagory;
        $data->catagory_name=$request->catagory;
        $data->save();
        return redirect()->back()->with('message', 'Catagory Added successfully');

    }

    public function delete_catagory($id){
        $data=catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Catagory Deleted successfully');
    }


    public function view_product(){
        $catagory = catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(request $request){
        $product = new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->catagory=$request->catagory;

        // Image
        $image=$request->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$image_name);
        $product->image=$image_name;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');


    }

    public function show_product(){
        $product=product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id){
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }


    public function update_product($id){

        $product=product::find($id);

        $catagory=catagory::all();

        return view('admin.update_product', compact('product', 'catagory'));    
    }


    public function update_confirm(Request $request, $id){

        $product=product::find($id);

        $product->description=$request->description;

        $product->price=$request->price;

        $product->discount_price=$request->discount_price;

        $product->catagory=$request->catagory;

        $product->quantity=$request->quantity;

        $image=$request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product', $imagename);

            $product->image=$imagename;
        }

        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully');
    }


    public function order(){

        $order=order::all();


        return view('admin.order', compact('order'));
    }



    public function delivered($id){

        $order=order::find($id);

        $order->delivery_status= 'Delivered';

        $order->payment_status= 'Paid';

        $order->save();

        return redirect()->back();
    }

}
