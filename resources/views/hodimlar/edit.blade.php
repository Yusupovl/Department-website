@extends('layouts.admin')

@section('main_title')
Hodimlar panel
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Hodimlar qo'shish formasi</h1>

<form action="{{route('hodimlar.update', [$hodim->id])}}" method="post" enctype="multipart/form-data">
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

    <div class="mb-3 row">
        <label for="upload_image" class="col-sm-2 col-form-label">Oldingi Rasm</label>
        <div class="col-sm-5">
            <img src="/talaba/{{$hodim->rasm}}" style="object-fit: contain;" width="150" height="150" alt="">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="upload_image" class="form-label">Boshqa rasm tanlash</label>
        <input class="form-control" type="file" name="upload_image" id="upload_image">
    </div>


    <div class="mb-3 row">
        <label for="familya" class="col-sm-2 col-form-label">Familya</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="familya" name="familya" value="{{$hodim->familya}}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="ism" class="col-sm-2 col-form-label">Ism</label>
        <div class="col-sm-5">
            <input type="text" name="ism" class="form-control" id="ism" value="{{$hodim->ism}}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="sharif" class="col-sm-2 col-form-label">Sharif</label>
        <div class="col-sm-5">
            <input type="text" name="sharif" class="form-control" id="sharif" value="{{$hodim->sharif}}">
        </div>
    </div>


    <div class=" mb-3 row">
        <label for="lavozim" class="col-sm-2 col-form-label">Lavozim</label>
        <div class="col-sm-5">
            <input type="text" name="lavozim" class="form-control" id="lavozim" value="{{$hodim->lavozim}}">
        </div>
    </div>

    <div class=" mb-3 row">
        <label for="xona_nomeri" class="col-sm-2 col-form-label">Xona nomer</label>
        <div class="col-sm-5">
            <input type="text" name="xona_nomer" class="form-control" id="xona_nomer" value="{{$hodim->xona_nomer}}">
        </div>
    </div>

    <div class=" mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">email</label>
        <div class="col-sm-5">
            <input type="text" name="email" class="form-control" id="email" value="{{$hodim->email}}">
        </div>
    </div>

    <div class=" mb-3 row">
        <label for="tel_raqam" class="col-sm-2 col-form-label">Telefon raqam</label>
        <div class="col-sm-5">
            <input type="text" name="tel_raqam" class="form-control" id="tel_raqam" value="{{$hodim->tel_raqam}}">
        </div>
    </div>


    <div class=" mb-3 row">
        <label for="tarjimai_hol" class="col-sm-2 col-form-label">Tarjimai hol</label>
        <div class="form-floating">
            <textarea class="form-control" name="tarjimai_hol" id="info" style="height: 100px; width: 600px">{{$hodim->tarjimai_hol}}</textarea>
        </div>
    </div>


    <input type="submit" class="btn btn-primary" value="Saqlash">
</form>

@endsection