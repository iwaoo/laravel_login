@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/talks" enctype="" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New Talk</h1>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Name</label>

                    <input id="name"
                           type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name') }}"
                           autocomplete="name" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="birth_year" class="col-md-4 col-form-label">Birth Year</label>

                    <input id="birth_year"
                           type="text"
                           class="form-control{{ $errors->has('birth_year') ? ' is-invalid' : '' }}"
                           name="birth_year"
                           value="{{ old('birth_year') }}"
                           autocomplete="birth_year" autofocus>

                    @if ($errors->has('birth_year'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birth_year') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="listen" class="col-md-4 col-form-label">Listen</label>

                    <input id="listen"
                           type="text"
                           class="form-control{{ $errors->has('listen') ? ' is-invalid' : '' }}"
                           name="listen"
                           value="{{ old('listen') }}"
                           autocomplete="listen" autofocus>

                    @if ($errors->has('listen'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('listen') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="talk" class="col-md-4 col-form-label">Talk</label>

                    <input id="talk"
                           type="text"
                           class="form-control{{ $errors->has('talk') ? ' is-invalid' : '' }}"
                           name="talk"
                           value="{{ old('talk') }}"
                           autocomplete="talk" autofocus>

                    @if ($errors->has('talk'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('talk') }}</strong>
                        </span>
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
