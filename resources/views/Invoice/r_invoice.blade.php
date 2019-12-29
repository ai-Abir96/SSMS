@extends('Dashboard.admin_dashboard')

@section('content')
<div class="container">
  <div class="card">
<div class="card-header">
Refund Invoice No
<strong>{{$rp-> id}}/{{$rp->created_at}}</strong>
  <span class="float-right"> <button>Print</button> </span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h3 class="mb-3">Customer Details:</h3>
<div>

</div>
<div>Name     :  {{$rp->customers->c_name}} </div>
<div>Email    :  {{ $rp->customers->c_email }}</div>
<div>Phone No :  {{$rp->customers->c_phone }}</div>
<div>Address  :  {{ $rp->customers->c_address}}</div>
</div>

<div class="col-sm-6">
<h3 class="mb-3">Seller Details:</h3>
<div>
</div>
<div>ID       :  {{$rp->users->id}}</div>
<div>Name     :  {{$rp->users->name}}</div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>

<th>Product ID</th>
<th>Product Name</th>
<th class="right">Unit Cost</th>
<th class="right">Discount</th>
  <th class="center">Qty</th>
  <th class="right">Cause</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
  @foreach($rpall as $r)

<tr>
<td class="left strong">{{$r->stocks->p_code}}</td>
<td class="left">{{$r->stocks->p_name}}</td>
<td class="right">{{$r->unitprice}}</td>
<td class="right">{{$r->discount}}</td>
<td class="center">{{$r->quantity}}</td>
<td class="right">{{$r->cause}}</td>
<td class="right">{{$r->amount}}</td>
</tr>

@endforeach

</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>

<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>{{$rp->total}}</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>
@endsection
