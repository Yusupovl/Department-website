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
                    <h2 class="m-0 font-weight-bold text-primary">Yangiliklar</h2>
                </div>
                <div class="col-md-4 ">
                    <button type="button" class="btn btn-success float-right">
                        <i class="fa-solid fa-plus"></i>
                        <a style="color:white;text-decoration:none;" href="{{route('yangiliklar.create')}}">yangilik qo'shish</a>
                    </button>
                </div>
            </div>



        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Turi</th>
                            <th>sarlavhasi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Turi</th>
                            <th>Sarlavhasi</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($yangilik as $t)
                        <tr>
                            <td>{{$t->turi}}</td>
                            <td>{{$t->sarlavhasi}} </td>
                            <td>
                                <a href="{{route('yangiliklar.show', [$t->id])}}" style="margin-right:10px;"><i class="fa-solid fa-info"></i><a>
                                        <a href="{{route('yangiliklar.edit', [$t->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
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