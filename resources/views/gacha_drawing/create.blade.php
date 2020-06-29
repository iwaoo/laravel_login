@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/gacha_drawing" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>ガチャページを作る</h1>
                </div>
                {{-- <gacha-drawing> </gacha-drawing>--}}

                <div class="form-group row">
                    <label for="a_word" class="col-md-4 col-form-label">一言</label>

                    <input id="a_word"
                           type="text"
                           class="form-control{{ $errors->has('a_word') ? ' is-invalid' : '' }}"
                           name="a_word"
                           value="{{ old('a_word') }}"
                           autocomplete="a_word" autofocus>

                    @if ($errors->has('a_word'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('a_word') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">説明</label>

                    <input id="description"
                           type="text"
                           class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                           name="description"
                           value="{{ old('description') }}"
                           autocomplete="description" autofocus>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
