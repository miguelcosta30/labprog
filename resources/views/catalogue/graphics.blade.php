@section ('title')
Graphic Cards | Online Store
@endsection
@section ('content')

<tbody>
	@forelse($graphicCard as $graphic)
	<tr>
		<td class="w-25">
			<img src="data:image/png;base64,{{ chunk_split(base64_encode($graphic->picture)) }}" class="img-fluid img-thumbnail" alt="graphic cards" width = "300" height = "300">
		</td>
		<td style="font-size:20px">{{$graphic->name}}</td>
		<td style="font-size:30px;font-weight:bold;">{{$graphic->price}}€</td>
		<td>
			<p class="btn-holder"><a href="{{url('/addToCart/'.$graphic->id)}}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
		</td>
	</tr>
	@empty
	<h5 class="text-center">No Graphic Cards Found!</h5>
	@endforelse
</tbody>
</table>

{!! $graphicCard->appends(Request::all())->links('pagination::bootstrap-4') !!} <?php //pagination ?>
@if(Session::has('sucess'))
<p class="alert alert-success">{{ Session::get('sucess') }}</p>
@endif

</div>
</div>
@endsection
@extends('layouts.product')