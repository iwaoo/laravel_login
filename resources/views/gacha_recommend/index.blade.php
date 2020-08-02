@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
          <form method="post" action="/gacha_recommend/update">
            @csrf
            @method('PATCH')

            @foreach ($GachaStyles as $GachaStyle)
                <li>@if ($GachaStyle->recommend_flg == true) <label for="recommend_flg" >true</label> @endif<input name="id[]" type="checkbox" value="{{ $GachaStyle->id }}">
                  <a href="{{ action('GachaController@show', $GachaStyle->id) }}">/gacha/{{ $GachaStyle->id }}</a></li>

            @endforeach
            <input type="submit" name="add" value="追加">
          </form>

        </div>
    </div>
</div>

@endsection
