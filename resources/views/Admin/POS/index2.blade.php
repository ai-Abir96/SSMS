@extends('Dashboard.admin_dashboard')

@section('content')

<style>
.hidden{
  display : none;
}

.show{
  display : block !important;
}
select.form-control.product_id {
    width: 150px;
}
</style>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">New Order</div>

				<div class="panel-body">
					<form class="form-horizontal" id="yoyo" role="form" method="POST" action="">
                        {!! csrf_field() !!}
                        <table class="table table-striped">
							<tr>
								<td>
									Customer Name: <input type="text" class="form-control" name="name" value="{{ old('name') }}">
								</td>
								<td>
									Location: <input type="text" class="form-control" name="location" value="{{ old('location') }}">
								</td>
							</tr>
						</table>

						<table class="table table-striped">
							<thead>
								<tr>
                  <th>ID</th>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Price</th>
                  <th>Available</th>
                  <th>Discount</th>
									<th>Quantity</th>
									<th>Sub-Total</th>
									<th>Delete</th>

								</tr>
							</thead>
							<tbody class="neworderbody">
								<tr>
									<td class="no">1</td>
									<td>
										<select class="form-control product_id" name="product_id[]">
											@foreach($products as $product)
											<option data-price="{{ $product->p_price}}"
                              data-name="{{ $product-> stocks-> p_name}}"
                              data-discount="{{$product-> p_discount}}"
                              data-available="{{$product-> stocks->quantity}}"
                              value="{{ $product->stocks->p_code }}">{{$product->stocks->p_code}}</option>
											@endforeach
										</select>
									</td>

                  <td>
										<input type="text" class="name form-control" name="name[]">
                  </td>

                  <td>
                    <input type="text" class="price form-control" name="price[]">
                  </td>

                  <td>
                    <input type="text" class="available form-control" name="available[]">
                  </td>

                  <td>
                    <input type="text" class="discount form-control" name="discount[]">
                  </td>

                  <td>
										<input type="text" class="qty form-control" name="qty[]">
                  </td>


									<td>
										<input type="text" class="amount form-control" name="amount[]">
									</td>
									<td>
										<input type="button" class="btn btn-danger delete" value="x">
									</td>


								</tr>

							</tbody>

							<tfoot>
								<th colspan="6">Total:<b class="total">0</b></th>
							</tfoot>


						</table>
						<input type="button" class="btn btn-lg btn-primary add" value="Add New Item">
						<hr>


					<hr>



				</div>

			</div>
		</div>
			<!--  Right -->


		</form>
		<!-- Modal -->


	<!-- Row End -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script type="text/javascript">
  	function totalAmount(){
  		var t = 0;
  		$('.amount').each(function(i,e){
  			var amt = $(this).val()-0;
  			t += amt;
  		});
  		$('.total').html(t);
  	}

    $(function () {
  		$('.getmoney').change(function(){
  			var total = $('.total').html();
  			var getmoney = $(this).val();
  			var t = getmoney - total;
  			$('.backmoney').val(t).toFixed(2);
  		});


  		$('.add').click(function () {
  			var product = $('.product_id').html();
  			var n = ($('.neworderbody tr').length - 0) + 1;
  			var tr = '<tr><td class="no">' + n + '</td>' + '<td><select class="form-control product_id" name="product_id[]">' + product + '</select></td>' +
                      '<td><input type="text" class="name form-control" name="name[]"></td>'+
                      '<td><input type="text" class="price form-control" name="price[]"></td>' +
                      '<td><input type="text" class="available form-control" name="available[]"></td>'+
              				'<td><input type="text" class="discount form-control" name="discount[]"></td>' +
                      '<td><input type="text" class="qty form-control" name="qty[]"></td>' +
              				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
              				'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
  			$('.neworderbody').append(tr);
  		});


  		$('.neworderbody').delegate('.delete', 'click', function () {
  			$(this).parent().parent().remove();
  			totalAmount();
  		});

  		$('.neworderbody').delegate('.product_id', 'change', function () {
  			var tr = $(this).parent().parent();

        var price = tr.find('.product_id option:selected').attr('data-price');
  			tr.find('.price').val(price);

        var name = tr.find('.product_id option:selected').attr('data-name');
  			tr.find('.name').val(name);

        var discount = tr.find('.product_id option:selected').attr('data-discount');
  			tr.find('.discount').val(discount);

        var available = tr.find('.product_id option:selected').attr('data-available');
  			tr.find('.available').val(available);


  			var qty = tr.find('.qty').val() - 0;
  			var discount = tr.find('.discount').val() - 0;
  			var price = tr.find('.price').val() - 0;

  			var total = (qty * price) - ((qty * price * discount)/100);
  			tr.find('.amount').val(total);
  			totalAmount();
  		});

      $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
  			var tr = $(this).parent().parent();
  			var qty = tr.find('.qty').val() - 0;
  			var discount = tr.find('.discount').val() - 0;
  			var price = tr.find('.price').val() - 0;

  			var total = (qty * price) - ((qty * price * discount)/100);
  			tr.find('.amount').val(total);
  			totalAmount();
  		});

          $('#hideshow').on('click', function(event) {
  			 $('#content').removeClass('hidden');
  			$('#content').addClass('show');
               $('#content').toggle('show');
          });



  	});
  </script>




 <script lang='javascript'>
 $(document).ready(function(){
  $('#printPage').click(function(){
        var data = '<input type="button" value="Print this page" onClick="window.print()">';
        data += '<div id="toPrint">';
        data += $('#toPrint').html();
        data += '</div>';

        myWindow=window.open('','','width=1200,height=1000');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
 </script>
</div>

@endsection
