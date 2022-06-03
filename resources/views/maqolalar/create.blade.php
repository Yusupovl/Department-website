@extends('layouts.admin')

@section('main_title')
Hodimlar panel
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Maqola qo'shish formasi</h1>

<form action="{{route('maqolalar.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- //@method('put') -->

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
            <option value="maqola">maqola</option>
            <option value="konfrensiya">konfrensiya</option>
            <option value="kitob">kitob</option>
            <option value="proyekt">proyekt</option>
        </select>
    </div>




    <div class="mb-3 row">
        <label for="file" class="form-label">Boshqa file tanlash</label>
        <input class="form-control" type="file" name="file" id="rasm">
    </div>


    <div class="mb-3 row">
        <label for="nomi" class="col-sm-2 col-form-label">Nomi</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="nomi" name="nomi">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="yili" class="col-sm-2 col-form-label">Yili</label>
        <div class="col-sm-5">
            <input type="text" name="yili" class="form-control" id="yili">
        </div>
    </div>

    <div class="mb-3 row" id="link_block">
        <label for="link" class="col-sm-2 col-form-label">link</label>
        <div class="col-sm-5">
            <input type="text" name="link" class="form-control" id="link">
        </div>
    </div>

    <input type="submit" class="btn btn-primary" value="Saqlash">
</form>

@endsection

@section('myjs')
<script>
    $('select').on('change', function() {
        if (this.value === "kitob") {
            $('#link').val("");
            $('#link_block').css('display', 'none');
        } else {
            $('#link').val("");
            $('#link_block').css('display', 'block');
        }
    });
</script>

@endsection