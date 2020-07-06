@extends('layouts.main')
@section('contant')
<div class="text-center">
<p><img src="{{asset('assets/post/upload/'.$posts->img)}}" height="250px" alt=""></p>
<p>{{$posts->title}}</p>
<p>{{ $posts->des }}</p>
<a href="#"><p><i class="fa fa-share-alt" aria-hidden="true"></i> shere</p></a>

</div>

@endsection