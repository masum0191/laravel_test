@extends('layouts.main')
@section('contant')
@section('css')
<style>
.card {
    position: relative;
    width: 100%;
    max-width: 400px;
}

.card img {
    width: 100%;
    height: 250px;
}

.card .btn {
    position: absolute;
    top: 92%;
    left: 84%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 10px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}

.card .btn:hover {
    background-color: black;
}
</style>
@endsection

<div class="">
    <div class="row">
        <!-- section-1  -->
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img" src="{{asset('assets/images/hero_2.jpg')}}" hieght="350px"
                            alt="Card image">
                        <button class="btn"><i class="fa fa-video-camera" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="card-columns">
                    @foreach($vedio as $value)
                        <div class="card ch1">
                          <a href="{{url('detials_vedio/'.$value->id)}}">  <img class="card-img-top" src="{{asset('assets/vedio/upload/'.$value->img)}}" alt="Card image cap">

                            <span class="btn"><i class="fa fa-file-video-o" aria-hidden="true"></i></span>
                            <p>{{$value->title}}</p>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>


            <div>
            </div>
        </div>
        <!-- section-2  -->
        <div class="col-md-5">

            <div class="row">
                <div class="">
                    <img class="card-img-top" src="{{asset('assets/images/hero_2.jpg')}}" alt="Card image cap">
                    <p>title</p>
                </div>
                <div class="col-md-12">
                    <div class="card-columns">
                    @foreach($posts as $va)
                        <div class="card p-2">
                           <a href="{{url('detials/'.$va->id)}}"> <img class="card-img-top" src="{{asset('assets/post/upload/'.$va->img)}}" height="250px" alt="Card image cap">
                            <p>{{ $va->title }}</p>
                            </a>

                        </div>
                    @endforeach
                    </div>
                </div>

            </div>









        </div>
    </div>
</div>
@endsection