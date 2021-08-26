@extends('layouts.main')

@section('title', 'Writeeers - me')

@section('content')
    <!-- User Content -->
    <main class="ui text container pt-8rem">

        <div class="mt-3rem"></div>

        <!-- Profile -->
        <div id="profile" class="ui very compact grid">

            <div class="eight wide column">

                <!-- username -->
                <div class="ui large header">
                    {{ $user->name }}
                    <a href="/me/{{ $user->name }}/edit" class="small ui tertiary button">Edit profile</a>
                    <p class="sub header">{{ $user->email }}</p>
                </div>

                <!-- bio profile -->
                <div class="sub header">
                    {{ $user->bio }}
                </div>

            </div>

            <div class="eight wide column">

                @if ($user->avatar === null)
                    <img src="{{ url('https://image.flaticon.com/icons/svg/2919/2919573.svg') }}" alt="user photo" class="ui avatar image">
                @else
                    <img src="{{ $user->avatar }}" alt="user photo" class="ui avatar image">
                @endif

            </div>

        </div>


        <!-- Posted Content -->
        <div id="yourPost" class="ui very compact grid">

            <div class="sixteen wide column">
                <div class="ui horizontal left aligned divider tiny header">
                    Featured on Writeeers<span style="color: #fb6400;">.</span>
                </div>
            </div>

            <div class="sixteen wide column">

                <div class="ui small header">
                    Your Story
                    <a href="{{ url('new-story') }}" class="ui tiny basic button">New story</a>
                </div>


                @if (count($storys) > 0)
                    <div class="ui segments">
                        @foreach ($storys as $story)
                            <div class="ui segment content">
                                <a href="{{ url('/', [$story->user->name, $story->title]) }}" class="ui small header">
                                    {!! \Illuminate\Support\Str::of($story->title)->replace('-', ' ') !!}
                                    <div class="sub header">oct 5</div>
                                </a>
                                <div id="action" class="ui inline dropdown">
                                    <div class="text">action</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu">
                                        <div class="active item">
                                            <a href="/story/edit/{{ $story->title }}" class="ui animated button">
                                                <div class="visible content">edit</div>
                                                <div class="hidden content">
                                                    <i class="edit outline icon"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <form action="/story/{{ $story->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="ui animated red button">
                                                    <div class="visible content">delete</div>
                                                    <div class="hidden content">
                                                        <i class="trash alternate outline icon"></i>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @else
                            <i class="aligned center">You haven’t published any stories yet.</i>
                    @endif


            </div>

        </div>

    </main>
@endsection
