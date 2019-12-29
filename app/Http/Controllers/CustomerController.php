<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  protected function validator(Request $request)
  {
      return Validator::make($request, [

        'c_name'=> ['required','string','max:50'],
        'c_email'=> ['required','email','max:150'],
        'c_phone'=> ['required','integer','min:11','max:11'],
        'c_address'=> ['required','string','max:100'],


      ]);
  }


    public function index()
    {

    }





    public function store(Request $request)
    {
      Customer::insert([

        'c_name'=> $request -> c_name,
        'c_email'=> $request -> c_email,
        'c_phone'=> $request -> c_phone,
        'c_address'=> $request -> c_address,

      ]);

      return redirect()->route('pos_index')
                       ->with('success','Customer Information is successfully Added.');
    }


    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
