@extends('layouts.main')

@section('title', 'Writeeers - me')

@section('content')
    <!-- Search Content -->
    <main class="ui text container pt-8rem">

        <div class="mt-3rem"></div>

        <!-- Search -->
        <div id="search" class="ui very compact grid">

            <form action="/search" method="POST">
                @csrf
                <div class="ui transparent massive input">
                    <input type="text" placeholder="Search on writeeers" name="q">
                </div>
            </form>

        </div>


        <!-- Posted Content -->
        <div id="yourPost" class="ui very compact grid">

            <div class="sixteen wide column">
                <div class="ui horizontal left aligned divider medium header">
                    Storys<span style="color: #fb6400;">.</span>
                </div>
            </div>

            <div class="sixteen wide column">

                @if (request('q') !== null)
                    @foreach ($story as $story)
                        @if (request('q') !== $story->title)
                            <div class="ui basic very padded segment">
                                <div class="ui stackable compact grid">
                                    <div class="six wide column">
                                        <a href="{{ url('/', $story->user->name).'/'.$story->title }}" class="ui main-content rounded fluid image">
                                            <img src="storage/images/{{ $story->image }}" alt="illustration">
                                        </a>
                                    </div>
                                    <div class="ten wide column">
                                        <div class="ui large header">
                                            <a href="{{ url('/', $story->user->name).'/'.$story->title }}">
                                                {!! \Illuminate\Support\Str::of($story->title)->replace('-', ' ') !!}
                                            </a>
                                            <div class="sub header">
                                                {!! \Illuminate\Support\Str::words($story->article, 12, '...') !!}
                                            </div>
                                        </div>
                                        <div href="#" class="ui small header">
                                            <a href="#" class="custom-link">{{ $story->user->name }}</a>
                                            <div class="sub header">{{ date('D m', strtotime($story->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <i>we couldn't find any story</i>
                        @endif
                    @endforeach
                @endif

            </div>

        </div>

    </main>
@endsection
