@extends('layouts.admin')

@section('main_title')
Hodimlar panel
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<h1 class="h3 mb-4 text-gray-800">Maqola qo'shish formasi</h1>

<form action="{{route('yangiliklar.store')}}" method="post" enctype="multipart/form-data">
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


    <div class="mb-3 row" id="link_block">
        <label for="link" class="col-sm-2 col-form-label">Sarlavhasi</label>
        <div class="col-sm-5">
            <input type="text" name="sarlavhasi" class="form-control" id="sarlavhasi">
        </div>
    </div>


    <div class="mb-3 row" id="link_block">
        <label for="link" class="col-sm-2 col-form-label">Matni</label>
        <div class="col-sm-5">
            <textarea name="matni" class="form-control" id="matni"></textarea>
        </div>
    </div>


    <input type="submit" class="btn btn-primary" value="Saqlash">
</form>

@endsection

@section('myjs')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<script>
    $(document).ready(function() {
        $('#matni').summernote({
            height: 450,
        });
    });

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