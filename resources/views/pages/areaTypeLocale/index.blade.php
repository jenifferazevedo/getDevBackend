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
                <div class="text-right py-4">
                    <a href="{{url($create)}}"><button class="btn btn-success">ADD {{$title}}</button></a>
                </div>
                @if (count($collection) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->name}}</td>
                                <td class="d-flex">
                                    <a class="mr-1" href="{{url($show. $item->id)}}"><button class="btn btn-success">Show</button></a>
                                    <form method="POST" action="{{url($destroy. $item->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                @component('components.message.messageEmptyResult', ["title" => $title])
                @endcomponent
                @endif
           </div>
        </div>
    </div>


@endsection
