@extends((Auth::user()->roles->pluck('name')=='Admin') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br />
  @endif

  <div class="container">
    <form class="form-inline" action="{{route('dateinput')}}" method="POST">
      @csrf
      <div class="" style="width:200px">
        Enter a Date: <input type="date" name="date"  class=" form-control">
        <button type="submit">Submit</button>
      </div>
    </form>

      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card" >
                  <div class="card-header">{{ __('Daily Report') }}</div>

                  <table>

                    <td style="width:810px"></td>

                        <td>
                          <a onclick="myApp.printTable()" class="btn btn-default" bgcolor="gray"><i class="fa fa-print">Print Page</i>

                        </a>
                      </td>
                    </tr>

                  </table>



                  <div id="toPrint"  class="card-body" >
                    @if(isset($dailyreport))
                      <table class="table table-responsive-xl table-striped table-hover">
                        <thead>
                            <tr>
                              <td>Order Id</td>
                              <td>Seller Name</td>
                              <td>Customer Name</td>
                              <td>Product Code</td>
                              <td>Quantity</td>
                              <td>Unit Price</td>
                              <td>Discount</td>
                              <td>Sub Total</td>
                              <td>Date</td>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyreport as $od)
                            <tr>
                                <td>{{$od->order_id}}</td>
                                <td>{{$od->orders->users->id}}-{{$od->orders->users->name}}</td>
                                <td>{{$od->orders->customers->c_name}}</td>
                                <td>{{$od->product_id}}</td>
                                <td>{{$od->quantity}}</td>
                                <td>{{$od->unitprice}}</td>
                                <td>{{$od->discount}}</td>
                                <td>{{$od->amount}}</td>
                                <td>{{$od->created_at->toDateString()}}</td>



                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      @endif
                  </div>
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
