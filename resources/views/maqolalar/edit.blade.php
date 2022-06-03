@extends('layouts.admin')

@section('main_title')
Hodimlar panel
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Maqolani o'zgartirish formasi</h1>

<form action="{{route('maqolalar.update', [$maqola->id])}}" method="post" enctype="multipart/form-data">
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
        <select class="form-select form_control" name="turi" aria-label="Default select example">
            <option value="maqola" {{$maqola->turi == 'maqola' ? 'selected' : ''}}>maqola</option>
            <option value="konfrensiya" {{$maqola->turi == 'konfrensiya' ? 'selected' : ''}}>konfrensiya</option>
            <option value="kitob" {{$maqola->turi == 'kitob' ? 'selected' : ''}}>kitob</option>
            <option value="proyekt" {{$maqola->turi == 'proyekt' ? 'selected' : ''}}>proyekt</option>
        </select>
    </div>

    @if (auth()->user()->id === 1)
    <select name="hodim" id="">
        @foreach ($hlist as $id=>$fio)
        @if($id != 1)
        <option value="{{$id}}" {{ $id === $maqola->user_id ? 'selected' : '' }}>{{$fio}}</option>
        @endif
        @endforeach
    </select>
    @endif

    <div class="mb-3 row">
        <label for="file" class="col-sm-2 col-form-label">Oldingi file</label>
        <div class="col-sm-5">
            <img src="/talaba/{{$maqola->file}}" style="object-fit: contain;" width="150" height="150" alt="">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="file" class="form-label">Boshqa file tanlash</label>
        <input class="form-control" type="file" name="file" id="rasm">
    </div>


    <div class="mb-3 row">
        <label for="nomi" class="col-sm-2 col-form-label">Nomi</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="nomi" name="nomi" value="{{$maqola->nomi}}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="yili" class="col-sm-2 col-form-label">Yili</label>
        <div class="col-sm-5">
            <input type="text" name="yili" class="form-control" id="yili" value="{{$maqola->yili}}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="link" class="col-sm-2 col-form-label">Sharif</label>
        <div class="col-sm-5">
            <input type="text" name="link" class="form-control" id="link" value="{{$maqola->link}}">
        </div>
    </div>

    <input type="submit" class="btn btn-primary" value="Saqlash">
</form>

@endsection