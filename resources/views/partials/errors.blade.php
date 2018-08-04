@if ($errors->any())
<div class="col-md-4 center-block">
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
<li> {{ $error }} </li>
@endforeach
</ul>
</div>
@endif