@extends('layouts.admin')

@section('main_title')

@endsection

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css">

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>


    @if (session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
    @endif




    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3 ">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="m-0 font-weight-bold text-primary">Fanlar</h2>
                </div>
                <div class="col-md-4 ">
                    <button type="button" class="btn btn-success float-right">
                        <i class="fa-solid fa-plus"></i>
                        <a style="color:white;text-decoration:none;" href="{{route('fanlar.create')}}">Yangi Fan qo'shish</a>
                    </button>
                </div>
            </div>



        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomi</th>
                            <th>syllabus</th>
                            <!-- <th>download</th> -->
                            <th style="width:150px;text-align:center;"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nomi</th>
                            <th>syllabus</th>
                            <!-- <th>download</th> -->
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($fan as $f)
                        <tr>
                            <td>{{$f->nomi}}</td>
                            <td>{{$f->syllabus}}
                                <p>Open file <a href="/talaba/{{$f->syllabus}}">example</a>.</p>
                            </td>
                            <!-- <td style=" text-align:center;"><a href="/talaba/{{$f->syllabus}}" download="{{$f->syllabus}}"><i class=" fa-solid fa-download"></i></a> -->
                            </td>
                            <td style="width:150px;text-align:center;font-size:25px;">
                                <!-- <a class="m-2" href="{{route('fanlar.show', [$f->id])}}" style="margin-right:10px;"><i class="fa-solid fa-info"></i><a> -->
                                <a class="m-2" href="{{route('fanlar.edit', [$f->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





    @endsection

    @section('myjs')

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

    @endsection