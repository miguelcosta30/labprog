@extends('layouts.template')
@section('title')
Address | Online Stored
@endsection
@section ('content')
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="post">
            @csrf
            <h2>Address</h2>
            <!-- Street Name-->
            <div class="control-group">
                <label class="control-label">Street Name</label>
                <div class="controls">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Street Name" name="streetName">
                </div>
            </div>
            <!-- Door Number-->
            <div class="control-group">
                <label class="control-label">Door Number</label>
                <div class="controls">
                    <input type="text" class="form-control" id="inputAddress" name="doorNumber" placeholder="Door Number">
                </div>
            </div>
            <!-- Floor -->
            <div class="control-group">
                <label class="control-label">Floor</label>
                <div class="controls">
                    <input type="text" class="form-control" id="inputAddress" name="floor" placeholder="Floor">
                    <p class="help-block"></p>
                </div>
            </div>
            <!-- Zip input-->
            <div class="control-group">
                <label class="control-label">Zip Code</label>
                <div class="controls">
                    <input type="text" class="form-control" id="inputAddress" name="zipcode" placeholder="xxx-xxxx">
                    <p class="help-block"></p>
                </div>
            </div>
            <button type="submit" class="btn btn-dark" style="background-color:#2e4057">Submit</button>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </div>
</div>
@endsection