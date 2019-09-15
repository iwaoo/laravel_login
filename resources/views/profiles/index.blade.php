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
                    @cannot ('view', $user->profile)
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcannot
                </div>
            </div>
            @can('update', $user->profile)
                <a class="btn-primary" href="/profile/{{ $user->id }}/edit" role="button">プロファイルを編集</a>
                <button class="btn" type="submit"></button>
            @endcan

            <div class="d-flex">
                <followers usernoid="{{ $user->id }}" followers_count="{{ $followersCount }}"></followers>
                <following usernoid="{{ $user->id }}" following_count="{{ $followingCount }}"></following>
            </div>

            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <test></test>

        </div>
    </div>
</div>
@endsection
