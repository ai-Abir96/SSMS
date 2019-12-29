<?php

namespace App\Http\Controllers\Product_category;
use App\Http\Controllers\Controller;

use App\Sub_Category;
use App\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
  protected function validator(Request $request)
  {
      return Validator::make($request, [

        'sct_name'=> ['required','string','max:50'],
        'sct_description'=> ['required','string','max:150'],

      ]);
  }



    public function index()
    {
      $categories = Category::all();
      $scategories = Sub_Category::all();
      return view('Admin.Category.Sub_Category.index',compact('scategories','categories'));
    }



    public function store(Request $request)
    {
      Sub_Category::insert([
        'cat_id'=>  $request -> cat_id,
        'sct_name'=> $request -> sct_name,
        'sct_description'=> $request -> sct_description,

      ]);

      return redirect()->route('scat_index')
                       ->with('success','Category is successfully Added.');
    }


    public function update(Request $request)
    {
      Sub_Category::find($request->id)->update([
        'sct_name'=> $request -> sct_name,
        'sct_description'=> $request -> sct_description,

       ]);
       return redirect()->route('scat_index')
                        ->with('success','Category is successfully Updated.');
    }



    public function destroy(Request $request)
    {
      Sub_Category::find($request-> id)->delete();

      return redirect()->route('scat_index')
                ->with('success','Category Deleted successfully.');
    }
}
