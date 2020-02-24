@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
          <h3>{{ $item->a_word }}</h3>
          <p>{{ $item->background_image1 }}</p>
          {{--
          <img src="/storage/{{ $item->background_image1 }}" class="w-100">
          --}}
          <div class="inline-block_test" id="background_image1" style="background-image: url(/storage/{{ $item->background_image1 }});">
              <p class="gacha">横並びにできます</p>
          </div>
          <div class="inline-block_test" id="background_image2" style="background-image: url(/storage/{{ $item->background_image2 }});">
              <p class="gacha">横並びにできます</p>
          </div>
          <div class="inline-block_test" id="background_image3" style="background-image: url(/storage/{{ $item->background_image3 }});">
              <p class="gacha">横並びにできます</p>
          </div>

        </div>
    </div>
</div>
@endsection
