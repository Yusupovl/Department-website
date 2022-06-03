@extends('layouts.home')

@section('content')



@endsection

@section('news')


<div class="card m-3" style="width: 24rem;">
    <img src="/talaba/{{$xodim->rasm}}" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">{{$xodim->ism}} {{$xodim->familya}} {{$xodim->sharif}}</p>
        <p class="card-text">Lavozim : {{$xodim->lavozim}}</p>
        <p class="card-text">Xona : {{$xodim->xona_nomer}}</p>
        <p class="card-text">Email : {{$xodim->email}}</p>
        <p class="card-text">Telefon raqam : {{$xodim->tel_raqam}}</p>
        <p class="card-text">Tarjimai hol : {{$xodim->tarjimai_hol}}</p>
    </div>
</div>









@endsection