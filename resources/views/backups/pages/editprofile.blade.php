@extends('layouts.main')

@section('title', 'Writeeers - edit profile')

@section('content')
    <!-- Form Edit Profile -->
    <div id="profileForm" class="ui text container pt-8rem">

        <form class="ui large form" method="POST" action="/me/{{ $user->id }}" enctype="multipart/form-data">

            @method('patch')
            @csrf

            <div class="field">
                <label>Change username</label>
                <input class="transparent" type="text" name="username" value="{{ $user->name }}">
            </div>

            <div class="field">
                <label>Add bio</label>
                <input class="transparent" type="text" name="bio" value="{{ $user->bio }}">
            </div>

            <div class="field">
                <label>Profile picture</label>
                @if ($user->avatar === null)
                    <img src="{{ url('resource/writeeers-logo-icon.png') }}" alt="user photo" class="ui avatar image">
                @else
                    <img src="{{ $user->avatar }}" alt="user photo" class="ui avatar image">
                @endif
                <div class="ui input left icon">
                    <i class="upload icon"></i>
                    <input class="transparent" type="file" name="profile">
                </div>
            </div>

            <button class="ui small button" type="submit">Save</button>
            <a href="{{ url('/me') }}" class="ui small basic button">Cancel</a>

        </form>

    </div>
@endsection
