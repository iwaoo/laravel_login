@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div id="fo-bu" class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->name }}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>

                </div>
            </div>

            <div class="d-flex">
                <followers followers_count="{{ $followersCount }}"></followers>
                <following following_count="{{ $followingCount }}"></following>
            </div>

            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <test></test>

        </div>
    </div>
</div>
@endsection
