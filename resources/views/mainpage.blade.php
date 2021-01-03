@extends('layouts.template')
@section ('title')
Online Store
@endsection
@section ('content')
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <form>
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://thegoodguys.sirv.com/Content/2021FY/Brands/Apple/wk20/iPhone/121120/21wk20-iphone-pro-bsb.jpg?profile=bce" class="d-block w-100" alt="rtx 30 series">
            </div>
            <div class="carousel-item">
                <img src="https://pbs.twimg.com/media/ElfxS0CUYAA_0CZ.jpg" class="d-block w-100" alt="iphone12">
            </div>
            <div class="carousel-item">
                <img src="https://d3ift91kaax4b9.cloudfront.net/media/Skrey_Slideshow/Slide_Image/r/t/rtx3060ti_1170x300px.jpg" class="d-block w-100" alt="ps5 ">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="position:relative;right:15%;"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="position:relative;left:15%;"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
<table class="table table-borderless">
    <thead>
        <tr style="background-color:#2e4057;">
            <th scope="col" style="color:white;">PHONES</th>
        </tr>
    </thead>
</table>
    <div class="row">
        @foreach($array['phones'] as $phone)
        <div class="col">
            <img src="data:image/png;base64,{{ chunk_split(base64_encode($phone->picture)) }}" alt="iphone 12" Height="250" width="250"></img>
            <p style ="font-size:17px ">{{$phone->name}}</p>
            <h1>{{$phone->price}}€</h1>
            <p class="btn-holder"><a href="{{url('/addToCart/'.$phone->id)}}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
        </div>
        @endforeach
    </div>
<table class="table table-borderless">
    <thead>
        <tr style="background-color:#2e4057;">
            <th scope="col" style="color:white;">PROCESSORS</th>
        </tr>
    </thead>
</table>
    <div class="row">
        @foreach($array['processor'] as $processor)
        <div class="col">
            <img src="data:image/png;base64,{{ chunk_split(base64_encode($processor->picture)) }}" alt="iphone 12" Height="250" width="250"></img>
            <p style ="font-size:17px">{{$processor->name}}</p>
            <h1>{{$processor->price}}€</h1>
            <p class="btn-holder"><a href="{{url('/addToCart/'.$processor->id)}}" class="btn btn-primary btn-block text-center" role="button" >Add to cart</a> </p>
        </div>
        @endforeach
    </div>
</form>
@endsection