<?php

namespace App\Http\Controllers\Product_category;
use App\Http\Controllers\Controller;

use App\Product;
use App\Stock;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{

  protected function validator(Request $request)
  {
      return Validator::make($request, [
        'sp_id'=> ['required'],
        'p_image'=>['required','string'],
        'p_price'=> ['required','integer','max:50'],
        'p_vat'=> ['required','integer','max:50'],
        'p_discount'=> ['required','integer','max:50'],

      ]);
    }

    public function index()
    {
      $products = Product::all();
      return view('Admin.Product.index',compact('products'));
    }


    public function create()
    {

      $stocks=Stock::all();

      return view('Admin.Product.create',compact('stocks'));

    }


    public function store(Request $request)
    {


      $last_inserted_id = Product::insertGetId([
        'sp_id'=> $request-> sp_id,
        'p_image'=> $request-> p_image,
        'p_price'=> $request-> p_price,
        'p_vat'=> $request-> p_vat,
        'p_discount'=> $request-> p_discount,

      ]);


      if ($request->hasFile('p_image'))
      {
              $photo_upload     =  $request -> p_image;
              $photo_extension  =  $photo_upload -> getClientOriginalExtension();
              $photo_name       =  $last_inserted_id . "." . $photo_extension;
              Image::make($photo_upload)->resize(320,240)->save(base_path('public/Images/Product_Image/'.$photo_name),100);

              Product::find($last_inserted_id)->update(['p_image' => $photo_name,]);


      }

      return redirect()->route('product_index')
                       ->with('success','Product is successfully Added.');

    }


    public function show()
    {

    }


    public function edit($id)
    {
      $products = Product::findOrFail($id);
      $stocks=Stock::all();


       return view('Admin.Product.update', compact('products','stocks'));
    }


    public function update(Request $request, $id)
    {
      $last_inserted_id = Product::insertGetId([
        'sp_id'=> $request-> sp_id,
        'p_image'=> $request-> p_image,
        'p_price'=> $request-> p_price,
        'p_vat'=> $request-> p_vat,
        'p_discount'=> $request-> p_discount,

      ]);


      if ($request->hasFile('p_image'))
      {
              $photo_upload     =  $request -> p_image;
              $photo_extension  =  $photo_upload -> getClientOriginalExtension();
              $photo_name       =  $last_inserted_id . "." . $photo_extension;
              Image::make($photo_upload)->resize(320,240)->save(base_path('public/Images/Product_Image/'.$photo_name),100);

              Product::find($last_inserted_id)->update(['p_image' => $photo_name,]);


      }

      return redirect()->route('product_index')
                       ->with('success','Product is successfully Added.');
    }


    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('product_index')
                  ->with('success','Product deleted successfully.');
    }
}
