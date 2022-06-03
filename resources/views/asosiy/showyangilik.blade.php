@extends('layouts.home')

@section('content')



@endsection

@section('news')

<h3>{{$yangilik->Sarlavhasi}}</h3>
<li>{{$yangilik->sana}}</li>
<li>{{$yangilik->joyi}}</li>
{!! $yangilik->matni !!}
<li></li>

@endsection