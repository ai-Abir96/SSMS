@extends('Dashboard.admin_dashboard')

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
            <a class="addtocart" onclick="addtocart('{{$product->stocks->p_code}}',
                                     '{{$product->p_price}}');">
              <div class="card">
                <input type="hidden" id="p_id" value="{{$product->stocks->p_code}}">
                <input type="hidden" id="itemName" value="{{$product->stocks->p_name}}">

                <h3>{{$product->stocks->p_code}}</h3>
               <img src="{{ asset('Images/Product_Image') }}/{{ $product->p_image }}" class="center" alt="{{ $product->p_image }}" style="width:80%">
               <h2>{{$product->p_name}}</h2>
               <p id ="pr_price" class="price">{{$product->p_price}}৳</p>
               <h4>Vat:{{$product->p_vat}}% || Discount:{{$product->p_discount}}%</h4>
               <h3>Available : {{$product->stocks->quantity}}</h3>


            @endif
          </div></a>
        </div>

            @endforeach


      </div>

        </div>
      </div>

      <div class="col-md-6">

          <div class="card scroll-card">
              <div class="header loader-div">
                  <h2 style="display: inline-block;">
                      Cart
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
                              <div class="totalDiv">
                                  <h3>Total = <span class="total"></span></h3>
                                  <h3>Vat = <span class=""></span></h3>
                                  <h3>Amount to be paid = <span class="" id="amountToBePaid"></span></h3>
                              </div>
                          </div>
                          <div class="m-b-10 m-r-10 p-t-10 clearfix" style="display: block;">
                              <a href="javascript:void(0);" id="delallcart" class="btn btn-danger m-r-10">Suspend</a>
                              <a onclick="calculatedata();" id="paymentbtn" class=" btn btn-success">Place order</a>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>

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

function addtocart(p_id,p_price){

    var n = ($('.newCart tr').length - 0) + 1;
    var tr ='<tr><td class="no">' + n + '</td>'+
                '<td><p class="p_id" name="p_id[]">'+p_id+'</p></td>'+
                '<td><p class="product_price" name="product_price[]">'+p_price+'</p></td>'+
                '<td><input type="text" style="width:70px;" class="qty form-control" min="1" name="qty[]"></td>'+
                '<td><p class="amount form-control" name="amount[]"></p></td>' +
                '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';

              $('.newCart').append(tr);


              $('.newCart').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
                  totalAmount();
              });


              $('.newCart').delegate('.p_id', 'change', function () {
                  var tr = $(this).parent().parent();
                  var qty = tr.find('.qty').val() - 0;
                  var price = p_price;
                  total = (qty * price);
                  tr.find('.amount').html(total);
                  totalAmount();
              });


              $('.newCart').delegate('.qty', 'keyup', function () {
          			var tr = $(this).parent().parent();
          			var qty = tr.find('.qty').val() - 0;

          			var price = p_price;

          			var total = (qty * price);
          			tr.find('.amount').html(total);
                totalAmount();
          		});



}


  function totalAmount(){

    var t = 0;
    $('.amount').each(function(i,e){
      var amt = $(this).html()-0;
      t += amt;

    });
    $('.total').html(t);
  }

</script>





@endsection
