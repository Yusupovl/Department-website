@extends('layouts.admin')

@section('main_title')
Talaba panel
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Fanlarni qo'shish formasi</h1>

<form action="{{route('fanlar.store')}}" method="post" enctype="multipart/form-data">
    @csrf

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
            <input type="text" name="nomi" class="form-control" id="nomi">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="upload_file" class="form-label">Fan syllabus ni kiriting</label>
        <input class="form-control" type="file" name="upload_file" id="upload_file">
    </div>


    <input type="submit" class="btn btn-primary" value="Saqlash">
</form>

@endsection