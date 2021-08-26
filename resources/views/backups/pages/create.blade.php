@extends('layouts.main')

@section('title', 'Writeeers - create new story')

@include('include.draganddrop')

@section('content')
    <!-- Form Edit Profile -->
    <div id="profileForm" class="ui text container pt-8rem">

        <form class="ui large form error" method="POST" action="{{ url('/story') }}" enctype="multipart/form-data">

            @csrf

            <input type="hidden" value="1" name="user_id">

            <div class="field">
                <div class="@error('image') field error @enderror">
                    <label>Add Image</label>
                    <input id="upload" type="file" name="image"/>
                </div>
            </div>
            @error('image')
                <div class="ui error message">
                    <p>{{ $message }}</p>
                </div>
            @enderror


            <div class="field">
                <div class="ui @error('title') field error @enderror">
                    <label>Title</label>
                    <input class="transparent" id="title" type="text" name="title" value="">
                </div>
            </div>
            @error('title')
                <div class="ui error message">
                    <p>{{ $message }}</p>
                </div>
            @enderror

            <div class="field">
                <div class="ui @error('article') field error @enderror">
                    <label>Article</label>
                    <textarea id="article-editor" type="text" name="article"></textarea>
                </div>
            </div>
            @error('article')
                <div class="ui error message">
                    <p>{{ $message }}</p>
                </div>
            @enderror

            <button type="submit" class="ui small button">Save</button>
            <a href="{{ URL::previous() }}" class="ui small basic button">Cancel</a>

        </form>

    </div>
@endsection
