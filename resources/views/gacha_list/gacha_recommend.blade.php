@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
          <form method="get" action="">
            @foreach ($ids as $id)

                <li><input checked="checked" name="id[]" type="checkbox" value="{{ $id->id }}">
                  <a href="{{ action('GachaController@show', $id->id) }}">/gacha/{{ $id->id }}</a></li>

            @endforeach
            <input type="submit" name="add" value="追加">
          </form>

        </div>
    </div>
</div>
<?php
  if(isset($_GET['id'])){
           if (is_array($_GET['id'])) {
                foreach($_GET['id'] as $value){
                   echo $value;
                }
             } else {
               $value = $_GET['is_ok'];
               echo $value;
          }
      }
?>
@endsection
