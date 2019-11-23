<?php

namespace App\Http\Controllers\Product_category;
use App\Http\Controllers\Controller;

use App\Sub_Category;
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

      $scategories = Sub_Category::all();
      return view('Admin.Product_Category.Sub_Category.index',compact('scategories'));
    }



    public function store(Request $request)
    {
      Sub_Category::insert([

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
