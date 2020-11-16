@extends((Auth::user()->roles->pluck('id')=='[1]') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

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

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <br />
@endif
@if(session()->get('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <br />
@endif
  <div class="row ">
    <div class="col-md-8 p-2" >
        <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for names..">
    </div>
  </div>


<div class="row" >
<div class="col-md-8">
  <h3>Products</h3>

</div>
</div>

<div  class="row">
    <div class="col-md-6" >
      <div class="card scroll-card ">
        <div class="row p-3" id="myItems">

          <?php
            $var =0;
           ?>

          @foreach($products as $product)
          <div class="col-md-4 mt-2">
            @if($var = 4)
            <a class="addtocart" onclick="addtocart('{{$product->stocks->id}}',
                                                '{{$product->stocks->p_code}}',
                                     '{{$product->p_price}}',
                                     '{{$product->p_discount}}');">
              <div class="card">
                <input type="hidden" id="p_code" value="{{$product->stocks->id}}">
                <input type="hidden" id="p_id" value="{{$product->stocks->p_code}}">
                <input type="hidden" id="itemName" value="{{$product->stocks->p_name}}">

                <h3>{{$product->stocks->p_code}}</h3>
               <img src="{{ asset('Images/Product_Image') }}/{{ $product->p_image }}" class="center" alt="{{ $product->p_image }}" style="width:80%">
               <h2>{{$product->stocks->p_name}}</h2>
               <p id ="pr_price" class="price">{{$product->p_price}}৳</p>
               <h4 class="discount"> Discount:{{$product->p_discount}}%</h4>
               @if($product->stocks->quantity != 0)
               <h3 class="stocks" style="color:green;">Available : {{$product->stocks->quantity}}</h3>
               @else
               <h3 class="stocks" style="color:red;">Out of Stock</h3>
               @endif


            @endif
          </div></a>
        </div>

            @endforeach


      </div>

        </div>
      </div>


      <div class="col-md-6">
        <form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ route('order_create') }}">
          {!! csrf_field() !!}
          <div class="card scroll-card">
              <div class="header loader-div">
                  <h2 style="display: inline-block;">
                      Cart
                  </h2>
                  <div class="lds-ellipsis m-l-25" style="display: none"><div></div><div></div><div></div><div></div></div>
              </div>

              <div>

              <table class="table table-striped">
                <h3 style="float:left; color:black;">Customer Details</h3>
                <tr>
  								<td>
  									Customer Name: <input type="text" class="form-control" name="c_name" value="{{ old('c_name') }}">
  								</td>
  								<td>
  									Email: <input type="text" class="form-control" name="c_email" value="{{ old('c_email') }}">
  								</td>
  							</tr>
                <tr>
  								<td>
  									Phone No: <input type="text" class="form-control" name="c_phone" value="{{ old('c_phone') }}">
  								</td>
  								<td>
  									Address: <input type="text" class="form-control" name="c_address" value="{{ old('c_address') }}">
  								</td>
  							</tr>
  						</table>
              </div>


              <div class="body">
                <h3 style="float:left; color:black;">Product Details</h3>
                  <div class="carts">
                      <div id="tblDiv">
                          <table id="cart" class="table table-bordered">
                              <thead>
                              <tr>
                                  <th>Serial No</th>
                                  <th>Product Code</th>
                                  <th>Price</th>

                                  <th>Quantity</th>
                                  <th>Sub Total</th>
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody class="newCart">
                              </tbody>
                          </table>

                          <div >
                              <div style="float:left"class="totalDiv">
                                  <input  type="hidden" class="totalamount" name="totalamount" id="t_amt" >
                                  <h3>Total = <span class="total"></span></h3>

                              </div>
                          </div>
                          <div class="m-b-10 m-r-10 p-t-10 clearfix" style="display: block;">
                              <a href="javascript:void(0);"  class="btn btn-danger m-r-10">Suspend</a>
                              <a onclick="amount();"data-toggle="modal"data-target="#confirmModel"  class="btn btn-primary btn-lg"  >Place Order</a>
                          </div>

                      </div>
                  </div>
              </div>
          </div>

      </div>

      <!-- - - - -  -  - - -  - - - -  - - Edit Status - -  - - - -  - - - - - - -->

        <!-- The Modal -->
        <div class="modal fade" id="confirmModel">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Status</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">

                <div class="form-group row">

                    <label for="name" class="col-md-4 col-form-label text-md-right">Please Select  A payment Method</label>
                    <div class="col-md-6">
                      <select class="form-control" name="status">
                          <option name="cash">Cash</option>
                      </select>


                    </div>
                    <label for="name" class="col-md-4 col-form-label text-md-right">Enter Amount</label>
                    <div class="col-md-6">
                    <input class="form-control" type="number" name="e_amount" id="amo">

                    </div>
                    <label for="name" class="col-md-4 col-form-label text-md-right">Return Money</label>
                    <div class="col-md-6">

                      <input class="form-control" type="number" name="r_money" id="mon">

                    </div>





                </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <a href=""><button type="submit" name="save" class="btn btn-primary" >Confirm</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </form>

            </div>
          </div>
        </div>
</form>
      <!--- - - - -  - -  - - - - - - - - - - -  -Edit Status done ------------------------------>
</div>


<script src="{{asset('js/jquerypos.min.js')}}"></script>
<script>


//search
function myFunction() {
    var input, filter, cards, cardContainer, h3, title, i;
    input = document.getElementById("myFilter");
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById("myItems");
    cards = cardContainer.getElementsByClassName("card");
    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector("h3");
        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}


//add to cart
function addtocart(p_code,p_id,p_price,p_discount){

    var n = ($('.newCart tr').length - 0) + 1;
    var tr ='<tr><td class="no">' + n + '</td>'+
                '<td><input style="border:none; width:70px;" type="text" class="p_id" name="p_id[]" value="'+p_id+'"></td>'+
                '<td><input style="border:none; width:70px;" type="text" class="p_price" style="border:none; width:70px;" name="p_price[]" value ="'+p_price+'"></td>'+
                '<td><input style=" width:70px;" type="text"  class="qty form-control" min="1" name="qty[]"></td>'+
                '<td><input style="border:none; width:100px;" class="amount form-control"  name="amount[]"></p></td>' +
                '<td><input type="button" class="btn btn-danger delete" value="x"></td>'+
                '<td><input style="border:none; width:70px;" type="hidden" class="p_discount" name="p_discount[]" value="'+p_discount+'"></td>'+
                '<td><input style="border:none; width:70px;" type="hidden" class="p_code" name="p_code[]" value="'+p_code+'"></td></tr>';

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
                  tr.find('.amount').val(total.toFixed(2));
                  totalAmount();



              });


              $('.newCart').delegate('.qty', 'keyup', function () {
          			var tr = $(this).parent().parent();

                var qty = tr.find('.qty').val() - 0;
          			var price = tr.find('.p_price').val() - 0;
                var discount = tr.find('.p_discount').val() - 0;
                var dis_price = (price * discount)/100;
                var total = (qty * price)- (qty*dis_price);

          			tr.find('.amount').val(total.toFixed(2));
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


func

</script>
<script type="text/javascript">
  $(document).ready(function(){

    $('#amo').keyup(function() {
      var q = $(this).val();
      var total = document.getElementById("t_amt").value;
      var r_money = q - total;
      if(r_money>0){
        document.getElementById("mon").value = r_money;
      }


  });

});
</script>




@endsection
