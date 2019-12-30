<?php

namespace App\Http\Controllers\Product_category;
use App\Http\Controllers\Controller;

use App\Stock;
use App\Category;
use App\Sub_category;
use App\Supplier;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class StockController extends Controller
{
  protected function validator(Request $request)
  {
      return Validator::make($request, [

        'p_code'=> ['required','string','max:50'],
        'p_name'=> ['required','string','max:50'],
        'fcat_id'=> ['integer'],
        'fscat_id'=> ['integer'],
        'fsup_id'=> ['integer'],
        'quantity'=> ['required','integer','max:50'],
        'st_price'=> ['required','integer','max:50'],
        'description'=> ['required','string','max:150'],

      ]);
    }

    public function index()
    {
      $stocks = Stock::all();
      return view('Admin.Stock.index',compact('stocks'));
    }


    public function create()
    {

      //$categories = Category::all();
      $subcategories = Sub_category::all();
      $suppliers = Supplier::all();
      $categories = DB::table("categories")->pluck("ct_name","id");

      return view('Admin.Stock.create',compact('categories','subcategories','suppliers'));

    }

    public function getsubcatList(Request $request)
       {
           $subcats = DB::table("sub_categories")
           ->where("cat_id",$request-> cat_id)
           ->pluck("sct_name","id");
           return response()->json($subcats);
       }


    public function store(Request $request)
    {
      Stock::insert([
        'p_code'=> $request-> p_code,
        'p_name'=> $request-> p_name,
        'fcat_id'=> $request-> fcat_id,
        'fscat_id'=> $request-> fscat_id,
        'fsup_id'=> $request-> fsup_id,
        'quantity'=> $request-> quantity,
        'st_price'=> $request-> st_price,
        'description'=> $request-> description,
        'created_at'=> Carbon::now(),
      ]);

      return redirect()->route('stock_index')
                       ->with('success','Stock is successfully Added.');

    }





    public function edit($id)
    {
      $stocks = Stock::findOrFail($id);
      $categories = DB::table("categories")->pluck("ct_name","id");
      $subcategories = Sub_category::all();
      $suppliers = Supplier::all();

       return view('Admin.Stock.update', compact('stocks','categories','subcategories','suppliers'));
    }


    public function update(Request $request)
    {
      Stock::find($request->id)->update([
        'p_code'=> $request-> p_code,
        'p_name'=> $request-> p_name,
        'fcat_id'=> $request-> fcat_id,
        'fscat_id'=> $request-> fscat_id,
        'fsup_id'=> $request-> fsup_id,
        'quantity'=> $request-> quantity,
        'st_price'=> $request-> st_price,
        'description'=> $request-> description
      ]);

        return redirect()->route('stock_index')
                  ->with('success','Stock updated successfully.');
    }


    public function destroy($id)
    {
        Stock::where('id',$id)->delete();
        return redirect()->route('stock_index')
                  ->with('success','Stock updated successfully.');
    }
}
