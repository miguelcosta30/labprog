@extends('layouts.template')
@section ('title')
Checkout | Online Store
@endsection
@section ('content')
<?php $total = 0; ?>
<br>
<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
        </h4>
        @if(session('shoppingCart'))
        @forelse(session('shoppingCart') as $id => $product)
        <?php $total += $product[2] * $product[3]; /*preco x quantidade */ ?>
        <ul class="list-group mb-3 sticky-top">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">{{$product[1]}}</h6>
                    <small class="text-muted">Qt: {{$product[3]}}</small>
                </div>
                <span class="text-muted">{{$product[2]}}</span>
            </li>
            @empty
            <h5 class="text-center">No Products Found!</h5>
            @endforelse
            @endif
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (EUR)</span>
                <strong>{{$total}}</strong>
            </li>
        </ul>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="lastName">Name</label>
                    <?php //print_r($address)?>
                    <input type="text" class="form-control" name = "name" placeholder="" value="{{ old('name') ? :  $address[4] }}" readonly> </input>
                </div>
            </div>
            <div class="mb-3">
                <label for="username">Street</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" class="form-control"  placeholder="" required="" name = "streetName" readonly value = "{{ old('streetName') ? :  $address[1] }}" > </input>
                </div>
            </div>
            <div class="mb-3">
                <label for="email">ZipCode</label>
                <input type="text" class="form-control"  placeholder="" readonly name = "zipcode" value = "{{ old('zipcode') ? :  $address[3] }}"> </input>
            </div>
            <div class="mb-3">
                <label for="address">Door Number</label>
                <input type="text" class="form-control" placeholder="" required="" readonly name = "doorNumber" value ="{{ old('doorNumber') ? :  $address[1] }}"> </input>
            </div>
            <div class="mb-3">
                <label for="address2">Floor</label>
                <input type="text" class="form-control" placeholder="" readonly name = "floor" value = "{{ old('floor') ? :  $address[2] }}"></input>
            </div>
            @if(is_null($address[0]))
            <div class="col"><a type="button" class="btn btn-dark" style="background-color:#2e4057;position:relative;top:20%;" name="adicionarMorada" href="{{url('account/addAddress')}}">+ Add Address</a></div>
            @else
            <div class="col"><a type="button" class="btn btn-dark" style="background-color:#2e4057;position:relative;top:20%;" name="alterarMorada" href="{{url('account/addAddress')}}">Change Address</a></div>
            @endif
            <hr class="mb-4">
            <h4 class="mb-3">Payment</h4>
            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                    <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                    <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                    <label class="custom-control-label" for="paypal">PayPal</label>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Considered Payed(Test Email and Bill)</label>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
        </form>
    </div>
</div>
<br>

@endsection