@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
            @foreach ($ids as $id)
                
                <li><a href="{{ action('GachaController@show', $id->id) }}">/gacha/{{ $id->id }}</a></li>

            @endforeach

        </div>
    </div>
</div>
@endsection
