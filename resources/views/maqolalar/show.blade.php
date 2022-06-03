@extends('layouts.admin')

@section('main_title')
Talabalar panel
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

@section('content')

<h1 class="h3 mb-4 text-gray-800">Nomi : {{$maqola->nomi}}</h1>

<object data="/talaba/{{$maqola->file}}" type="application/pdf" width="300px" height="300px">
    <p> <a href="/talaba/{{$maqola->file}}">>Download file</a></p>
</object>

<li>Turi : {{$maqola->turi}}</li>
<li>Yili : {{$maqola->yili}}</li>
<li>Link : {{$maqola->link}}</li>



@endsection