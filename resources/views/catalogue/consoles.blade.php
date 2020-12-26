@section ('title')
Consoles | Online Store
@endsection
@section('content')
<tbody>
    @forelse($console as $cons)
    <tr>
        <td class="w-25">
            <img src="data:image/png;base64,{{ chunk_split(base64_encode($cons->picture)) }}" class="img-fluid img-thumbnail" alt="graphic cards" width="300" height="300">
        </td>
        <td style="font-size:20px">{{$cons->name}}
            <ul style="font-size:17px">
                <li>{{$cons->firstSpecification}}</li>
                <li>{{$cons->secondSpecification}}</li>
                <li>{{$cons->thirdSpecification}}</li>
            </ul>
        </td>
        <td style="font-size:30px;font-weight:bold;">{{$cons->price}}€</td>
        <td>
            <p class="btn-holder"><a href="{{url('/addToCart/'.$cons->id)}}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
        </td>
    </tr>
    @empty
    <h5 class="text-center">No Consoles Found!</h5>
    @endforelse
</tbody>
</table>
{!! $console->appends(Request::all())->links('pagination::bootstrap-4') !!} <?php //pagination 
                                                                            ?>
@if(Session::has('sucess'))
<p class="alert alert-success">{{ Session::get('sucess') }}</p>
@endif
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
</div>
</div>
@endsection

@extends('layouts.product')