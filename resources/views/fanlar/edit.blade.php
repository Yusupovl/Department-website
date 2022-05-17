@extends('layouts.admin')

@section('main_title')
Talabalar panel
@endsection

@section('content')


<h1 class="h3 mb-4 text-gray-800">Fanlarni o'zgartirishh formasi</h1>

<form action="{{route('fanlar.update', [$fan->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class=" mb-3 row">
        <label for="nomi" class="col-sm-2 col-form-label">Fan nomi</label>
        <div class="col-sm-5">
            <input type="text" name="nomi" class="form-control" id="nomi" value="{{$fan->nomi}}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="upload" class="col-sm-2 col-form-label">Oldingi Syllabus</label>
        <div class="col-sm-5">
            <file src="/talaba/{{$fan->syllabus}}" width="150" height="150" alt="">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="upload_file" class="form-label">syllabus ni kiriting</label>
        <input class="form-control" type="file" name="upload_file" id="upload_file">
    </div>



    <input type="submit" class="btn btn-primary" value="Saqlash">
</form>

@endsection