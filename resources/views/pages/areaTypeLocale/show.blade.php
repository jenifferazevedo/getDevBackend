@extends('master.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{$title}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
           <div class="col-8">
                @if ($item)
                    <div class="card mx-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Id:{{$item->id}}</h6>
                        <p class="card-text">
                            <p>{{isset($item->created_at) ? $item->created_at->format('m/d/Y') : ""}}</p>
                            <p>{{isset($item->updated_at) ? $item->updated_at->format('m/d/Y') : ""}}</p>
                        </p>
                        <div class="d-flex">
                            <a class="mr-1 ml-auto" href="{{url($edit. $item->id)}}"><button class="btn btn-success">Edit</button></a>
                            <form method="POST" action="{{url($destroy. $item->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="text-center py-5 my-5">
                        <a href="{{url($voltar)}}"><button class="btn btn-outline-danger">Cancel</button></a>
                    </div>
                @else
                    <h2>Não é você, somos nós. Tente novamente mais tarde</h2>
                @endif
            </div>
        </div>
    </div>
@endsection
