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
                        <label for="inputName">Company name</label>
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

                    <div class="form-group">
                        <label for="inputLogo">Company logo</label>
                        <input name="logo" type="text" class="form-control @error('logo') is-invalid @enderror" id="inputLogo"
                        @if (isset($item)) value="{{$item->logo}}"
                        @else value="{{old('logo')}}"
                        @endif
                        required autocomplete="logo">

                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="description"

                        required autocomplete="description">@if (isset($item)) {{$item->description}}
                        @else {{old('description')}}
                        @endif</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="inputAddress"
                        @if (isset($item)) value="{{$item->address}}"
                        @else value="{{old('address')}}"
                        @endif
                        required autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputlocale">Locale</label>
                        <select class="form-control" name="locale_id" id="inputlocale">
                            @foreach ($locales as $locale)
                                <option value="{{$locale->id}}"
                                    @isset($item)
                                        @if($locale->id == $item->locale->id )) selected @endif
                                        @endisset
                                        >{{$locale->name}}</option>
                            @endforeach
                         </select>
                    </div>

                    <div class="form-group">
                        <label for="inputContact">Contact</label>
                        <input name="contact" type="number" class="form-control @error('contact') is-invalid @enderror" id="inputContact"
                        @if (isset($item)) value="{{$item->contact}}"
                        @else value="{{old('contact')}}"
                        @endif autocomplete="contact">

                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                        @if (isset($item)) value="{{$item->email}}"
                        @else value="{{old('email')}}"
                        @endif
                        required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="inputSite">Site</label>
                        <input name="site" type="text" class="form-control @error('site') is-invalid @enderror" id="inputSite"
                        @if (isset($item)) value="{{$item->site}}"
                        @else value="{{old('site')}}"
                        @endif
                        required autocomplete="site">

                        @error('site')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="inputLinkedin">Linkedin</label>
                        <input name="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" id="inputLinkedin"
                        @if (isset($item)) value="{{$item->linkedin}}"
                        @else value="{{old('linkedin')}}"
                        @endif
                        required autocomplete="linkedin">

                        @error('linkedin')
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
