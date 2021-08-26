@extends('layouts.main')

@section('title')
{!! \Illuminate\Support\Str::of($main->title)->replace('-', ' ') !!}
@endsection

@section('content')
    <!-- CONTENT VIEW HERE -->
    <main id="contentView" class="ui left aligned text container pt-8rem">

        <!-- Title -->
        <div class="ui header">
            {!! \Illuminate\Support\Str::of($main->title)->replace('-', ' ') !!}
        </div>

        <!-- User Account or Writen by -->
        <div class="writer-user">
            <div style="color: #fb6400">Writen by :</div>
            @if ($main->user->avatar === null)
                <img src="{{ url('https://image.flaticon.com/icons/svg/2919/2919573.svg') }}" alt="user photo" class="ui avatar image">
            @else
                <img src="{{ $main->user->avatar }}" alt="user photo" class="ui avatar image">
            @endif
            <span>{{ $main->user->name }}</span>
        </div>

        <!-- Main Image -->
        <div class="main-image">
            <img src="/storage/images/{!! $main->image !!}" alt="image" class="ui fluid rounded image">
        </div>

        <!-- Main Content -->
        <article class="ui main-content fluid rounded image">
            {!! $main->article !!}
        </article>


        <!-- More Content show -->
        <div class="ui horizontal left aligned divider header">
            Featured on Writeeers<span style="color: #fb6400;">.</span>
        </div>

        <div class="ui three column grid">

            @if (count($randomStory) > 0)
                @foreach ($randomStory as $randstory)
                    <div class="column">
                        <div class="ui link card">
                            <a href="{{ url('/', $randstory->user->name).'/'.$randstory->title }}" class="ui image">
                                <img src="/storage/images/{!! $randstory->image !!}">
                            </a>
                            <a href="{{ url('/', $randstory->user->name).'/'.$randstory->title }}" class="ui header">{!! \Illuminate\Support\Str::of($randstory->title)->replace('-', ' ') !!}</a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

    </main>


    <!-- FOOTER -->
    <div class="ui down-footer black inverted vertical segment">
        <div class="ui left aligned custom container">
            <div class="ui stackable inverted divided grid">
                <div class="four wide column left aligned">
                    <div class="ui inverted header">Account</div>
                    <div class="ui inverted link list">
                        <a href="./signIn.html" class="item">Sign in</a>
                        <a href="./signUp.html" class="item">Get started</a>
                        <a href="#" class="item">About me</a>
                    </div>
                </div>
                <div class="eight wide column left aligned">
                    <div class="ui inverted header">About Developers</div>
                    <p>Hi, My name <a href="https://instagram/diazfarindra_">Diaz Farindra</a> dah gini aja dulu gua
                        binggung mau nulis apaan</p>
                </div>
            </div>
            <div class="ui inverted section divider"></div>
            <img src="./assets/writeeers-logo-inverted.png" class="ui image" alt="logo">
            <div class="ui inverted mini header">
                <p>made with <i class="heart small icon"></i> by <a href="https://instagram/diazfarindra_">Diaz
                        Farindra</a> | &copy;
                    <script>
                        document.write(new Date().getUTCFullYear())
                    </script> Writeeers. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection
