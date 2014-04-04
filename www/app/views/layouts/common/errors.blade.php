@if($errors->any())
<div class="row">
	<div class="content-card columns">
	@foreach($errors->all('<p>:message</p>') as $message)
	{{$message}}
	@endforeach
	</div>
</div>
@endif