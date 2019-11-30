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
    <div class="col-md-8" >
      <div class="card scroll-card ">
        <div class="row p-3" id="myItems">

          <?php
            $var =0;
           ?>

          @foreach($products as $product)
          <div class="col-md-4 mt-2">
            @if($var = 4)
              <div class="card">
                <input type="hidden" id="p_id" value="{{$product->stocks->p_code}}">
                <input type="hidden" id="itemName" value="{{$product->stocks->p_name}}">

                <h3>{{$product->stocks->p_code}}</h3>
               <img src="{{ asset('Images/Product_Image') }}/{{ $product->p_image }}" class="center" alt="{{ $product->p_image }}" style="width:80%">
               <h2>{{$product->p_name}}</h2>
               <p class="price">{{$product->p_price}}৳</p>
               <h4>Vat:{{$product->p_vat}}% || Discount:{{$product->p_discount}}%</h4>

               <a onclick="addtocart('{{$product->stocks->p_code}}',
                                        '{{$product->p_price}}');" class="btn btn-primary">Add to cart</a>
            @endif
          </div>
        </div>

            @endforeach


      </div>

        </div>
      </div>

      <div class="col-md-4">

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
                                  <th>Product Code</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                                <tr id="cartRow">

                                </tr>
                              </tbody>
                          </table>

                          <div >
                              <div class="totalDiv">
                                  <h3>Total = <span class="amount"></span></h3>
                                  <h3>Vat = <span class="amount"></span></h3>
                                  <h3>Amount to be paid = <span class="amount" id="amountToBePaid"></span></h3>
                              </div>
                          </div>
                          <div class="m-b-10 m-r-10 p-t-10 clearfix" style="display: block;">
                              <a href="javascript:void(0);" id="delallcart" class="btn btn-danger m-r-10">Suspend</a>
                              <a href="javascript:void(0);" id="paymentbtn" class="btn btn-success">Place order</a>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>





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

      if ($("#cart tbody").length == 0) {
          $("#cart").append("<tbody></tbody>");
      }

      $("#cart tbody").append(
          "<tr>" +
            "<td>"+p_id+"</td>" +
            "<td>"+p_price+"</td>" +
            "<td><input type='number' style='width:50px'; min='1' value='1'></td>" +
            "<td>"+"<button type='button'"+"onclick='productDelete(this);' "+"class='dlt'>"+"<span class='glyphicon glyphicon-remove' />"+"</button>"+"</td>" +
        "</tr>"
      );
}

function productDelete(ctl) {
  $(ctl).parents("tr").remove();
}
</script>





@endsection
