<?php

namespace App\Http\Controllers\Product_category;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
  protected function validator(Request $request)
  {
      return Validator::make($request, [

        'ct_name'=> ['required','string','max:50'],
        'ct_description'=> ['required','string','max:150'],

      ]);
  }



    public function index()
    {
      $categories = Category::all();
      return view('Admin.Category.Category.index',compact('categories'));
    }



    public function store(Request $request)
    {
      Category::insert([

        'ct_name'=> $request -> ct_name,
        'ct_description'=> $request -> ct_description,
        'created_at'=> Carbon::now(),

      ]);

      return redirect()->route('cat_index')
                       ->with('success','Category is successfully Added.');
    }


    public function update(Request $request)
    {
      Category::find($request->id)->update([
        'ct_name'=> $request -> ct_name,
        'ct_description'=> $request -> ct_description,

       ]);
       return redirect()->route('cat_index')
                        ->with('success','Category is successfully Updated.');
    }



    public function destroy(Request $request)
    {
      Category::find($request-> id)->delete();

      return redirect()->route('cat_index')
                ->with('success','Category Deleted successfully.');
    }
}
