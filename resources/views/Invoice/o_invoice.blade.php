@extends((Auth::user()->roles->pluck('id')=='[1]') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

@section('content')
<div class="container">
  <span class="float-right"> <button onclick="myApp.printTable()" >Print</button> </span>
  <div id="toPrint"class="card">

<div class="card-header">
Order Invoice No
<strong>{{$ordersall-> id}}/{{$ordersall->created_at->toDateString()}}</strong>
<h3><center>SSMS</center></h3>


</div>
<div  class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h3 class="mb-3">Customer Details:</h3>
<div>

</div>
<div>Name     :  {{$ordersall->customers->c_name}} </div>
<div>Email    :  {{ $ordersall->customers->c_email }}</div>
<div>Phone No :  {{$ordersall->customers->c_phone }}</div>
<div>Address  :  {{ $ordersall->customers->c_address}}</div>
</div>

<div class="col-sm-6">
<h3 class="mb-3">Seller Details:</h3>
<div>
</div>
<div>ID       :  {{$ordersall->users->id}}</div>
<div>Name     :  {{$ordersall->users->name}}</div>
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
<th class="right">Total</th>
</tr>
</thead>
<tbody>
  @foreach($orderdetails as $od)

<tr>
<td class="left strong">{{$od->stocks->p_code}}</td>
<td class="left">{{$od->stocks->p_name}}</td>
<td class="right">{{$od->unitprice}}</td>
<td class="right">{{$od->discount}}</td>
<td class="center">{{$od->quantity}}</td>
<td class="right">{{$od->amount}}</td>
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
<strong>{{$ordersall->totalamount}}</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>
<script >

  var myApp = new function () {
         this.printTable = function () {
             var tab = document.getElementById('toPrint');
             var win = window.open('', '', 'height=700,width=700');
             win.document.write(tab.outerHTML);
             win.document.close();
             win.print();
         }
     }


</script>
@endsection
