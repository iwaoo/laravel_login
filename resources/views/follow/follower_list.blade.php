@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div id="fo-bu" class="d-flex align-items-center pb-3">
                  <ul class="list-unstyled">
                    <?php foreach ($followers as $follower): ?>
                        <li>{{ $follower->name }}</li>
                    <?php endforeach; ?>

                  </ul>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
