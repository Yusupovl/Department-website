@extends('layouts.home')

@section('content')



@endsection

@section('news')

<form action="{{route('showhodim')}}" method="post">
    @csrf
    <div class="d-flex flex-wrap d-flex justify-content-center">
        @foreach($hodim as $h)
        <div class="card m-3" style="width: 15rem;">
            <img src="/talaba/{{$h->rasm}}" style="width:15rem;height:18rem;" class="card-img-top" alt="xodim rasm">
            <div class="card-body">
                <h5 class="card-title">{{$h->ism}} {{$h->familya}}</h5>
                <p class="card-text">{{$h->lavozim}}</p>
                <button type="submit" class="btn btn-outline-primary" name="xodim" value="{{$h->id}}">full</button>
            </div>
        </div>
        @endforeach
    </div>
</form>

@endsection