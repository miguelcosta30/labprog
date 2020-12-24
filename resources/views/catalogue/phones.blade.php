@section ('title')
Phones | Online Store
@endsection
@section('content')
<tbody>
	@forelse($phones as $phone)
	<tr>
		<td class="w-25">
			<img src="data:image/png;base64,{{ chunk_split(base64_encode($phone->picture)) }}" class="img-fluid img-thumbnail" alt="phones" width = "300" height = "300">
		</td>
		<td style="font-size:20px">{{$phone->name}}</td>
		<td style="font-size:30px;font-weight:bold;">{{$phone->price}}€</td>
		<td>
			<p class="btn-holder"><a href="{{url('/addToCart/'.$phone->id)}}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
		</td>
	</tr>
	@empty
	<h5 class="text-center">No Phones Found!</h5>
	@endforelse
</tbody>
</table>

{!! $phones->links('pagination::bootstrap-4') !!} <?php //pagination 
													?>
@if(Session::has('sucess'))
<p class="alert alert-success">{{ Session::get('sucess') }}</p>
@endif
</div>
</div>
@endsection
@extends('layouts.product')