
@extends((Auth::user()->roles->pluck('id')=='[1]') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

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
    <form class="form-inline" action="{{route('refundbydate')}}" method="POST">
      @csrf
      <div class="" style="width:200px">
        Enter a Date: <input type="date" name="date"  class=" form-control">
        <button type="submit">Submit</button>
      </div>
    </form>

      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card" >
                  <div class="card-header">{{ __('Refund Details') }}</div>

                  <table>
                    <tr >
                      <td style="width:810px"></td>


                        <td>
                          <a onclick="myApp.printTable()" class="btn btn-default" bgcolor="gray"><i class="fa fa-print">Print Page</i>

                        </a>
                      </td>
                    </tr>

                  </table>

                  <div id="toPrint" class="card-body" >
                    <h3><center>SSMS</center></h3>
                    <h4>Redund Details</h4>
                    @if(isset($rps))
                      <table id="_search"  class="table table-responsive-xl table-bordered table-hover">
                        <thead>
                            <tr>
                              <td>Order ID</td>
                              <td>Customer Name</td>
                              <td>Seller Name</td>
                              <td>Refunder Name</td>
                              <td>Product Code</td>
                              <td>Unit Price</td>
                              <td>Discount</td>
                              <td>Cause</td>
                              <td>Quantity</td>
                              <td>Amount</td>
                              <td>Refund Time</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rps as $rp)
                            <tr>
                                <td>{{$rp->order_id}}</td>
                                <td>{{$rp->customers->c_name}}</td>
                                <td>{{$rp->users-> name}}</td>
                                <td>{{$rp->users-> name}}</td>
                                <td>{{$rp->stocks-> p_code}}</td>
                                <td>{{$rp->unitprice}}</td>
                                <td>{{$rp->discount}}</td>
                                <td>{{$rp->cause}}</td>
                                <td>{{$rp->quantity}}</td>
                                <td>{{$rp->amount}}</td>
                                <td>{{$rp->created_at->toDateString()}}</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

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
