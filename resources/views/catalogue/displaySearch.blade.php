@extends('layouts.product')
@section('title') Search Results | Online Store @endsection
@section('content')
<tbody>
	@forelse($abc as $res)
	<tr>
		<td class="w-25">
			<img src="data:image/png;base64,{{ chunk_split(base64_encode($res->picture)) }}" class="img-fluid img-thumbnail" alt="{{$res->name}}" width = "300" height = "300">
		</td>
		<td style="font-size:20px">{{$res->name}}</td>
		<td style="font-size:30px;font-weight:bold;">{{$res->price}}€</td>
		<td>
			<p class="btn-holder"><a href="{{url('/addToCart/'.$res->id)}}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
		</td>
	</tr>
	@empty
	<h5 class="text-center">No Products Like this where Found!</h5>
	@endforelse
</tbody>
</table>
{!! $abc->appends(Request::all())->links('pagination::bootstrap-4') !!} <?php //pagination ?>
@if(Session::has('sucess'))
<p class="alert alert-success">{{ Session::get('sucess') }}</p>
@endif
</div>
</div>
@endsection
