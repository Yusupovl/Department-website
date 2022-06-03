@extends('layouts.admin')

@section('main_title')
Hodimlar panel
@endsection

@section('content')

<h3>{{$yangilik->sarlavhasi}}</h3>
<div>
    {!! $yangilik->matni !!}
</div>

@endsection