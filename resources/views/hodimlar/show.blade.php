@extends('layouts.admin')

@section('main_title')
Hodimlar panel
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

@section('content')

<br><img src="/talaba/{{$hodim->rasm}}" class="img-thumbnail" width="300px" height="400px" alt="...">

<h1 class="h3 mb-4 text-gray-800">{{$hodim->ism}} {{$hodim->familya}} {{$hodim->sharif}} {{$hodim->id}} </h1>

<li>Lavozim : {{$hodim->lavozim}}</li>
<li>Xona nomeri : {{$hodim->xona_nomer}}</li>
<li>Email : {{$hodim->email}}</li>
<li>Telefon raqami : {{$hodim->tel_raqam}}</li>


@endsection