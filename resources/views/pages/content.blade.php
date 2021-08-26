@extends('layouts.main')

@section('title', 'Writeeers')

@section('content')

    <!-- JUMBOTRON -->
    <section id="jumbotron" class="ui custom container pt-8rem">
        <div class="ui fitted tertiary inverted custom segment">

            <div class="ui stackable very compact grid">

                <div class="eight wide column">
                    <div class="ui header">
                        Welcome to Writeeers<span style="color: #fb6400;">.</span>
                        <div class="sub header">
                            the new style to create, write, and read your story
                            or whatever you love
                        </div>
                        <a href="{{ url('/') }}#main" class="ui tertiary big button">let's see</a>
                    </div>
                </div>

                <div class="eight wide column">
                    <img src="{{ url('resource/vlog.png') }}" alt="illustration" class="ui big image">
                </div>

            </div>

        </div>
    </section>

    <!-- MAIN SECTION -->

    <!-- Main content -->
    <main id="main" class="ui custom container">

        <div class="ui horizontal left aligned divider ontop medium header">
            Latest posts<span style="color: #fb6400;">.</span>
        </div>

        <div class="ui grid">

            <div class="eleven wide column">

                @foreach ($shuffledStorys as $story)

                    <div class="ui basic very padded down-count segment">
                        <div class="ui stackable compact grid">

                            <div class="six wide column">
                                <a href="{{ url('/', [$story->user->name, $story->title]) }}" class="ui main-content rounded fluid image">
                                    <img src="{{ url('storage/images', $story->image) }}" alt="illustration">
                                </a>
                            </div>

                            <div class="ten wide column">

                                <div class="ui large header">
                                    <a href="{{ url('/', [$story->user->name, $story->title]) }}">
                                        {{ Str::of($story->title)->replace('-', ' ') }}
                                    </a>
                                    <div class="sub header">
                                        {!! Str::words($story->article, 25, $end = '...') !!}
                                    </div>
                                </div>

                                <div href="#" class="ui small header">
                                    <a href="#" class="custom-link">{{ $story->user->name }}</a>
                                        <div class="sub header">{{ date('D m', strtotime($story->created_at)) }}</div>
                                </div>

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

            <div id="popularMenu" class="five wide column">

                <div class="ui horizontal left aligned divider onside medium header">
                    Popular on Writeeers<span style="color: #fb6400;">.</span>
                </div>

                <div class="ui padded inverted custom segment">

                    @if (count($randomStorys) > 0)

                        @foreach ($randomStorys as $randstory)

                            <div class="ui horizontal card">
                                <div class="content">

                                    <div class="ui medium header">
                                        <a href="{{ url('/', [$randstory->user->name, $randstory->title]) }}">{{ Str::of($randstory->title)->replace('-', ' ') }}</a>
                                    </div>

                                    <div class="description">
                                        <div href="#" class="ui small header">
                                            <a href="#" class="custom-link">{{ $randstory->user->name }}</a>
                                            <div class="sub header">{{ date('D m', strtotime($randstory->created_at)) }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    @endif

                </div>

            </div>

        </div>

    </main>

@endsection

@include ('include.footer')
