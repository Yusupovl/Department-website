@extends('layouts.home')

@section('content')



@endsection
@section('news')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


@foreach($fan as $f)

<div class="col-4 mt-3">
    @csrf
    <div class="card text-white bg-primary  " style="max-width: 100%;">
        <div class="card-header">{{$f->nomi}}</div>
        <div class="card-body">
            <h5 class="card-title">{{$f->nomi}}</h5>
            <a href="/talaba/{{$f->syllabus}}" class="text-white">Download file <i class="fa-solid fa-download"></i></a>
        </div>
    </div>
</div>
@endforeach
@endsection