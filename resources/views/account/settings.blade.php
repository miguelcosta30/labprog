@extends('layouts.template')
@section('title')
Settings | Online Store
@endsection
@section ('content')
<br></br>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background-color:#2e4057;width:150%;height:110%;font-size:20px">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" style="color:white">Edit Account Info</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="color:white">Addreses</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent" style="position:relative;left:15%">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <h1 style="color:black">Change Password</h1><a type="button" class="btn btn-dark" href="{{url('/password/reset')}}" style="background-color:#2e4057">Change Password</a>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <label for="exampleFormControlTextarea1">Defined Adress</label>
                <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="4" style="width:85%">Street: {{$address[0]}} &#13;&#10; Door Number: {{$address[1]}} &#13;&#10; Floor: {{$address[2]}} &#13;&#10; Zip-Code: {{$address[3]}} </textarea>
                <div class="form-group">
                    <div class="row">
                        <div class="form-group">
                            @if(is_null($address[0]))
                            <div class="col"><a type="button" class="btn btn-dark" style="background-color:#2e4057;position:relative;top:20%;" name="adicionarMorada" href="{{url('account/addAddress')}}">+ Add Address</a></div>
                            @else
                            <div class="col"><a type="button" class="btn btn-dark" style="background-color:#2e4057;position:relative;top:20%;" name="alterarMorada" href="{{url('account/addAddress')}}">Change Address</a></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br></br>
@endsection