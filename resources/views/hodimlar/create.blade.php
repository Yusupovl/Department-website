@extends('layouts.admin')

@section('main_title')
Hodimlar panel
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Hodimlar qo'shish formasi</h1>

<form action="{{route('hodimlar.store')}}" method="post" enctype="multipart/form-data">
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
        <label for="ism" class="col-sm-2 col-form-label">Ism</label>
        <div class="col-sm-5">
            <input type="text" name="ism" class="form-control" id="ism">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="familya" class="col-sm-2 col-form-label">Familya</label>
        <div class="col-sm-5">
            <input type="text" name="familya" class="form-control" id="familya">
        </div>
    </div>


    <div class=" mb-3 row">
        <label for="sharif" class="col-sm-2 col-form-label">Sharif</label>
        <div class="col-sm-5">
            <input type="text" name="sharif" class="form-control" id="sharif">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="upload_image" class="form-label">rasmini yuklash</label>
        <input class="form-control" type="file" name="upload_image" id="upload_image">
    </div>

    <div class=" mb-3 row">
        <label for="lavozim" class="col-sm-2 col-form-label">Lavozim</label>
        <div class="col-sm-5">
            <input type="text" name="lavozim" class="form-control" id="lavozim">
        </div>
    </div>

    <div class=" mb-3 row">
        <label for="xona_nomeri" class="col-sm-2 col-form-label">Xona nomer</label>
        <div class="col-sm-5">
            <input type="text" name="xona_nomer" class="form-control" id="xona_nomer">
        </div>
    </div>

    <div class=" mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">email</label>
        <div class="col-sm-5">
            <input type="text" name="email" class="form-control" id="email">
        </div>
    </div>

    <div class=" mb-3 row">
        <label for="tel_raqam" class="col-sm-2 col-form-label">Telefon raqam</label>
        <div class="col-sm-5">
            <input type="text" name="tel_raqam" class="form-control" id="tel_raqam">
        </div>
    </div>

    <div class=" mb-3 row">
        <label for="tarjimai_hol" class="col-sm-2 col-form-label">Tarjimai hol</label>
        <div class="form-floating">
            <textarea class="form-control" name="tarjimai_hol" id="info" style="height: 100px; width: 600px"></textarea>
        </div>
    </div>


    <input type="submit" value="Saqlash">
</form>

@endsection