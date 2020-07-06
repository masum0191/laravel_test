@extends('layouts.main')
@section('contant')
<div class="text-center">
<?php $vedio_name =$vedio->vedio_url; ?>
<p>@php 
echo $vedio_name;
@endphp 
</p>
<p>{{$vedio->title}}</p>
<p>{{ $vedio->des }}</p>
<a href="#"><p><i class="fa fa-share-alt" aria-hidden="true"></i> shere</p></a>

</div>

@endsection