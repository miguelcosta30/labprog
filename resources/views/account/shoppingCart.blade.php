@extends('layouts.template')
@section ('title') Your Cart | Online Store
@endsection
@section ('content')

<?php $total = 0; ?>
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Total</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @if(session('shoppingCart'))
        @forelse(session('shoppingCart') as $id => $product)
        <?php $total += $product[2] * $product[3]; /*preco x quantidade */ ?>
        <td data-th="prod">
            <div class="row">
                <div class="col-sm-3 hidden-xs"><img src="data:image/png;base64,{{ chunk_split(base64_encode($product[0])) }}" width="100" height="100" alt="..." class="img-responsive" /></div>
                <div class="col-sm-9">
                    <h4 class="nomargin">{{$product[1]}}</h4>
                </div>
            </div>
        </td>

        <td data-th="Price">{{$product[2]}}€</td>
        <form action="{{ route('shoppingCart.update') }}" method="post">
            <td>
                @csrf
                <input type="number" class="form-control text-center" name="quantityProd" id="quantityProd" value="{{$product[3]}}">
            </td>
            <td class="actions">
                <input type="hidden" value="{{ $product[4] }}" id="idSub" name="idSub">
                <button class="btn btn-info btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                    </svg></i></a>
        </form>
        <form action="{{ route('shoppingCart.remove') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $product[4] }}" id="idRemove" name="idRemove">
            <button class="btn btn-danger btn-sm" style="position:relative;left:5px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg></i></button>
        </form>
        </td>
        </tr>
        @empty
        <h5 class="text-center">No Phones Found!</h5>
        @endforelse
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-dark" style="background-color:#2e4057">Continue Shopping</a>
                <a href="#todo" class="btn btn-info " style="background-color:#2e4057">Proceed To Checkout</a>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total: {{$total}}€</strong></td>
        </tr>
    </tfoot>
</table>

@endsection