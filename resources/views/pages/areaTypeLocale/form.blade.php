@extends('master.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2 class="py-3">{{$title}} Form</h2>
                <form action="@if (isset($item))
                    {{url($update)."/".$item->id}}
                @else
                    {{url($store)}}
                @endif " method="POST" novalidate>
                    @csrf
                    @if (isset($item))
                        <input name="id" type="hidden" value="{{$item->id}}" />
                    @endif
                    <div class="form-group">
                        <label for="inputName">{{$title}}</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName"
                        @if (isset($item)) value="{{$item->name}}"
                        @else value="{{old('name')}}"
                        @endif
                        required autocomplete="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-right">
                        @if (isset($item)) <button type="submit" class="btn btn-primary">Update</button>
                        @else <button type="submit" class="btn btn-primary">Submit</button>
                        @endif
                    </div>
                </form>
                <div class="text-center py-5 my-5">
                    <a href="{{url($voltar)}}"><button class="btn btn-outline-danger">Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
