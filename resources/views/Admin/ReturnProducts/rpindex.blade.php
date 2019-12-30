@if((Auth::user()->roles->pluck('name')) == 'Admin')
  @extends('Dashboard.admin_dashboard')
@else((Auth::user()->roles->pluck('name')) == 'Salesman')
  @extends('Dashboard.salesman_dashboard')
@endif

@section('content')
<style>
.card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
max-width: 800px;
margin: auto;
text-align: center;
font-family: arial;
}

.price {
color: grey;
font-size: 22px;
}

</style>


<div >
  <form class="" action="{{ route('rp_getorderid') }}" method="post">
@csrf
    <table class="table-striped">
      <h1><b>Order Id</b></h1>
      <tr>
      <td><input style="width:300px;" type="name" class="form-control" name="id"></td>
      <td><input type="submit" class="btn btn-primary" name="save" value="Submit"></td>
      </tr>
    </table>
  </form>

</div>

<br>
<br>
@if(isset($orders))

<form class="form-horizontal"  role="form" method="POST" action="{{route('rp_create')}}">
  @csrf

<div class="row" >
  <div class="col-md-6">
    <input type="text" class="form-control" name="o_id" value="{{$orders->id}}">
    <table class="table table-striped">
      <h3 style="float:left; color:black;">Seller Details</h3>
      <tr>
        <td>
        <p>Seller ID:  {{$orders->users->id}}</p><input type="hidden" class="form-control" name="s_id" value="{{$orders->users->id}}">
        </td>
        <td>
        <p>Seller Name:  {{$orders->users->name}}</p><input type="hidden" class="form-control" name="c_name" value="{{$orders->users->c_name}}">
        </td>
        <td>
        <p> Email:  {{ $orders->users->email }}</p><input type="hidden" class="form-control" name="c_email" value="{{ $orders->users->c_email }}">
        </td>
      </tr>
      <tr>
        <td>
        <p>Phone No:  {{$orders->users->c_phone }}</p><input type="hidden" class="form-control" name="c_phone" value="{{$orders->users->c_phone }}">
        </td>
      </tr>
    </table>

    <table class="table table-striped">
    <h3 style="float:left; color:black;">Customer Details</h3>
    <tr>
      <td>
      <input type="hidden" class="form-control" name="c_id" value="{{$orders->customers->id}}">
      <p>Customer Name:  {{$orders->customers->c_name}}</p><input type="hidden" class="form-control" name="c_name" value="{{$orders->customers->c_name}}">
      </td>
      <td>
      <p> Email:  {{ $orders->customers->c_email }}</p><input type="hidden" class="form-control" name="c_email" value="{{ $orders->customers->c_email }}">
      </td>
    </tr>
    <tr>
      <td>
      <p>Phone No:  {{$orders->customers->c_phone }}</p><input type="hidden" class="form-control" name="c_phone" value="{{$orders->customers->c_phone }}">
      </td>
      <td>
      <p>Address:  {{ $orders->customers->c_address}}</p><input type="hidden" class="form-control" name="c_address" value="{{ $orders->customers->c_address}}">
      </td>
    </tr>
  </table>
</div>





<div class="col-md-6">

    <div class="card scroll-card">
        <div class="header loader-div">
            <h2 style="display: inline-block;">
                Refund
            </h2>
            <div class="lds-ellipsis m-l-25" style="display: none"><div></div><div></div><div></div><div></div></div>
        </div>

        <div class="body">

            <div class="carts">
                <div id="tblDiv">
                    <table id="cart" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Product Code</th>
                            <th>UnitPrice</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th style="width:100px">Returning Cause</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody class="newCart">
                        </tbody>
                    </table>

                    <div >
                        <div style="float:left"class="totalDiv">
                            <input  type="hidden" class="totalamount" name="totalamount" >
                            <h3>Total = <span class="total"></span></h3>

                        </div>
                    </div>
                    <div class="m-b-10 m-r-10 p-t-10 clearfix" style="display: block;">
                        <a href="javascript:void(0);"  class="btn btn-danger m-r-10">Suspend</a>
                        <input type="submit" class="btn btn-primary btn-lg" name="save" value="Place Order">
                    </div>

                </div>
            </div>
        </div>
    </div>
  </form>
</div>


<div class="col-md-6" >


          <div >

            <div class="body">
              <h3 style="float:left; color:black;">Product Details</h3>
                <div >
                    <div >
                        <table  class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Sub Total</th>
                                <th>Purchase Date</th>
                                <td>Action</td>
                            </tr>
                            </thead>
                            @foreach($orderdetails as $od)
                            <tbody >
                              <td>{{$od->stocks->p_code}}</td>
                              <td>{{$od->unitprice}}</td>
                              <td>{{$od->quantity}}</td>
                              <td>{{$od->discount}}</td>
                              <td>{{$od->amount}}</td>
                              <td>{{$od->created_at->toDateString()}}</td>
                              <td><a onclick="addtorefund(
                                                          '{{$od->stocks->p_code}}',
                                                          '{{$od->unitprice}}',
                                                          '{{$od->discount}}',
                                                          '{{$od->stocks->id}}');" class="addtorefund btn btn-primary">Refund</a></td>
                            </tbody>
                            @endforeach
                        </table>



                    </div>
                </div>
            </div>

          </div>



      </div>






@endif
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">


function addtorefund(code,p_price,p_discount,pid){

var n = ($('.newCart tr').length - 0) + 1;
var tr ='<tr><td class="no">' + n + '</td>'+
            '<td><input style="border:none; width:70px;" type="text" class="p_id" name="p_id[]" value="'+code+'"></td>'+
            '<td><input style="border:none; width:70px;" type="text" class="p_price" style="border:none; width:70px;" name="p_price[]" value ="'+p_price+'"></td>'+
            '<td><input style=" width:70px;" type="text"  class="qty form-control" min="1" name="qty[]"></td>'+
            '<td><input style="border:none; width:70px;" class="amount form-control"  name="amount[]"></td>' +
            '<td><input style="border:none; width:70px;" class="cause form-control"  name="cause[]"></td>' +
            '<td><input type="button" class="btn btn-danger delete" value="x"></td>'+

            '<td><input style="border:none; width:0px;" type="hidden" class="p_discount" name="p_discount[]" value="'+p_discount+'"></td>'+
            '<td><input style="border:none; width:70px;" type="hidden" class="p_code" name="p_code[]" value="'+pid+'"></td></tr>';


          $('.newCart').append(tr);



          $('.newCart').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
              totalAmount();
          });


          $('.newCart').delegate('.p_id', 'change', function () {
              var tr = $(this).parent().parent();
              var qty = tr.find('.qty').val() - 0;
              var price = tr.find('.p_price').val() - 0;
              var discount = tr.find('.p_discount').val() - 0;
              var dis_price = (price * discount)/100;
              var total = (qty * price)- (qty*dis_price);

              tr.find('.amount').val(total);
              totalAmount();

          });


          $('.newCart').delegate('.qty', 'keyup', function () {
            var tr = $(this).parent().parent();
            var qty = tr.find('.qty').val() - 0;
            var price = tr.find('.p_price').val() - 0;
            var discount = tr.find('.p_discount').val() - 0;
            var dis_price = (price * discount)/100;
            var total = (qty * price)- (qty*dis_price);

            tr.find('.amount').val(total);
            totalAmount();
          });


}

//total amount

function totalAmount(){

var t = 0;
$('.amount').each(function(i,e){
  var amt = $(this).val()-0;
  t += amt;

});
$('.total').html(t);
$('.totalamount').val(t);
}


</script>






@endsection
