@extends('layouts.home')

@section('content')



@endsection

@section('carusel')
<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0"></li>
        <li data-target="#demo" data-slide-to="1" class="active"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner ">
        <div class="carousel-item ">
            <img src="/carusel/img1.jpg" alt="YTIT" style="width:100%" height="450px">
        </div>
        <div class="carousel-item active">
            <img src="/carusel/img2.png" alt="YTIT" style="width:100%" height="450px">
        </div>
        <div class="carousel-item ">
            <img src="/carusel/img3.jpg" alt="YTIT" style="width:100%" height="450px">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
@endsection



@section('news')


@foreach($yangilik as $y)

<div class="col-4 mt-3">
    <form action="{{route('fullnews.showh')}}" method="post">
        @csrf
        <div class="card text-white bg-primary  " style="max-width: 100%;">
            <div class="card-header">{{$y->turi}}</div>
            <div class="card-body">
                <h5 class="card-title">{{$y->sarlavhasi}}</h5>
                <img src="{{$y->rasm}}" width="50" height="50" class="card-image" alt="{{$y->rasm}}"><br>
                <button type="submit" class="btn btn btn-success" value="{{$y->id}}" name="id">Primary</button>
            </div>
        </div>
    </form>
</div>
@endforeach
@endsection