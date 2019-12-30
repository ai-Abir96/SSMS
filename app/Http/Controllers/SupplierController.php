<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SupplierController extends Controller
{
  protected function validator(Request $request)
  {
      return Validator::make($request, [
        's_id'=> ['required'],

        's_name'=> ['required','string','max:50'],

        's_phone'=> ['required','integer','min:11','max:11'],

        's_address'=> ['required','string','max:100'],

        'description'=> ['required','string','max:150'],


      ]);
  }




    public function index()
    {
      $suppliers = Supplier::all();

      return view('Admin.Supplier.index',compact('suppliers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Supplier.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Supplier::insert([
        's_id'=> $request -> s_id,
        's_name'=> $request -> s_name,
        's_phone'=> $request -> s_phone,
        's_address'=> $request -> s_address,
        'description'=> $request -> description,
        'created_at'=> Carbon::now(),

      ]);

      return redirect()->route('sup_index')
                       ->with('success','Supplier Information is successfully Added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $supplier = Supplier::findOrFail($id);

       return view('Admin.Supplier.update', compact('supplier'));
    }



    public function update(Request $request, $id)
    {
      Supplier::find($request->id)->update([
        's_id'=> $request -> s_id,
        's_name'=> $request -> s_name,
        's_phone'=> $request -> s_phone,
        's_address'=> $request -> s_address,
        'description'=> $request -> description,

       ]);
       return redirect()->route('sup_index')
                        ->with('success','Supplier Information is successfully Updated.');

    }


    public function destroy($id)
    {
      Supplier::where('id',$id)->delete();

      return redirect()->route('sup_index')
                ->with('success','Supplier Information Deleted successfully.');
    }
}
