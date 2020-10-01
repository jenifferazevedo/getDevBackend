@extends('master.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{$title}}</h1>
                <div class="d-flex py-2">
                    <a class="ml-auto" href="{{url($create)}}"><button class="btn btn-success">ADD {{$title}}</button></a>
                </div>
                <div class="d-flex py-4">
                    <form class="d-flex flex-grow-1" method="POST" action="{{url($searchName)}}">
                        @csrf
                        <input class="w-100" type="text" name="name" placeholder="name"/>
                        <button type="submit" class="btn btn-info text-white">Search</button>
                    </form>
                </div>
            </div>
        </div>
        @if (count($collection) > 0)
            <div class="row">
                @foreach ($collection as $item)
                    <div class="col-3 px-2">
                        <div class="card w-100" style="height: 300px;">
                            <a href="{{$item->site}}" target="_blank"><img src="{{!empty($item->logo) ? $item->logo : './img/logo.png'}}" class="card-img-top" alt="Logo {{$item->name}}"    onerror="this.onerror=null;this.src='./img/logo.png';"></a>
                            <div class="card-body">
                                <h5 class="card-title">{{$item->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$item->locale->name}}</h6>
                                <div class="d-flex align-self-stretch">
                                    <a href="{{$item->linkedin}}" class="mr-2 ml-auto" target="_blank"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
                                    <a href="{{url($show)."/".$item->id}}"><i class="fa fa-plus-square fa-3x" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    @component('components.message.messageEmptyResult', ["title" => $title])
                    @endcomponent
                </div>
            </div>
        @endif
    </div>


@endsection
