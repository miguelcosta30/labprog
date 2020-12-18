@extends('layouts.template')
@section ('title')
Online Store
@endsection
@section ('content')
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="data/rtx.jpg" class="d-block w-100" alt="rtx 30 series">
                </div>
                <div class="carousel-item">
                    <img src="data/iphone12.jpg" class="d-block w-100" alt="iphone12">
                </div>
                <div class="carousel-item">
                    <img src="data/ps5.jpg" class="d-block w-100" alt="ps5 ">
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
                    <th scope="col" style="color:white;">NOVIDADES</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col"><img src="data/iphone12teste.jpg" alt="iphone 12"></img></td>
                    <td><img src="data/iphone12teste1.jpg" alt="iphone 12 pro"></img></td>
                    <td><img src="data/rtx3090teste.jpg" alt="rtx 3090"></img></td>
                    <td><img src="data/ps5teste.jpg" alt="ps5"></img></td>
                </tr>
                <tr>
                    <td scope="col"><a>Iphone 12 6.1'' 256GB</a></td>
                    <td>
                        <p>Iphone 12 Pro Max 6.7'' 256GB</p>
                    </td>
                    <td>
                        <p>RTX 3090 Trinity 24GB</p>
                    </td>
                    <td>
                        <p>PS5 SSD 825GB</p>
                    </td>
                </tr>
                <tr>
                    <td scope="col">
                        <h1>1099,99€</h1>
                    </td>
                    <td>
                        <h1>1700,99€</h1>
                    </td>
                    <td>
                        <h1>1499,00€</h1>
                    </td>
                    <td>
                        <h1>499, 99€</h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-borderless">
            <thead>
                <tr style="background-color:#2e4057;">
                    <th scope="col" style="color:white;">PROMOÇÕES</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col"><img src="data/iphone12teste.jpg"> <sup style="font-size: 15px;"><span class="badge badge-primary" style="background-color:#2e4057">-10%</span></sup></img></td>
                    <td><img src="data/iphone12teste1.jpg"></img> <sup style="font-size: 15px;"><span class="badge badge-primary" style="background-color:#2e4057">-20%</span></td>
                    <td><img src="data/rtx3090teste.jpg"></img> <sup style="font-size: 15px;"><span class="badge badge-primary" style="background-color:#2e4057">-15%</span></td>
                    <td><img src="data/ps5teste.jpg"></img> <sup style="font-size: 15px;"><span class="badge badge-primary" style="background-color:#2e4057">-5%</span></td>
                </tr>
                <tr>
                    <td scope="col"><a>Iphone 12 6.1'' 256GB</a></td>
                    <td>
                        <p>Iphone 12 Pro Max 6.7'' 256GB</p>
                    </td>
                    <td>
                        <p>RTX 3090 Trinity 24GB</p>
                    </td>
                    <td>
                        <p>PS5 SSD 825GB</p>
                    </td>
                </tr>
                <tr>
                    <td scope="col">
                        <h1>1099,99€</h1>
                    </td>
                    <td>
                        <h1>1700,99€</h1>
                    </td>
                    <td>
                        <h1>1499,00€</h1>
                    </td>
                    <td>
                        <h1>499, 99€</h1>
                    </td>
                </tr>
            </tbody>
        </table>

@endsection
