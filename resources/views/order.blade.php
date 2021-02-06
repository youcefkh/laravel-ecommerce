@extends('master')
@section('content')
    @if (Session::has('msg'))
        <p class="alert alert-success">{{Session::get('msg')}}</p>
    @endif
    <h2>Order</h2>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="col">Amount</th>
                <td scope="col">{{$total}}$</td>
            </tr>
            <tr>
                <th scope="col">Tax</th>
                <td scope="col">0$</td>
            </tr>
            <tr>
                <th scope="col">Delivery</th>
                <td scope="col">10$</td>
            </tr>
            <tr>
                <th scope="col">Total Amount</th>
                <td scope="col" class="text-success">{{$total + 10}}$</td>
            </tr>
        </tbody>
    </table>

    <form action="{{route('order')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1" class="font-weight-bold">Address</label>
          <input type="text" name="address" class="form-control w-50" id="exampleInputEmail1" placeholder="Enter your address" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Choose Payment Method</label>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" value="online" name="payment" class="custom-control-input" checked>
            <label class="custom-control-label" for="customRadio1">Online payment</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" value="EMI" name="payment" class="custom-control-input">
            <label class="custom-control-label" for="customRadio2">EMI payment</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio3" value="on delivery" name="payment" class="custom-control-input">
            <label class="custom-control-label" for="customRadio3">Payment on delivery</label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Order Now</button>
    </form>

@endsection