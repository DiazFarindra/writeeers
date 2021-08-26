<!-- NAVBAR -->
    <header id="navbar">
        <div class="fixed ui stackable small borderless menu b-transparent">
            <div class="container ui custom">

                <!-- * Logo img * -->
                <div class="item">
                    <a href="{{ url('/') }}">
                        <img class="ui logo-navbar image" loading="lazy" src="{{ asset('resource/writeeers-logo.png') }}" alt="logo">
                    </a>
                </div>

                <!-- * Right Layout * -->
                <div class="right menu">

                    <!-- Search -->
                    @if (url()->full() === url('/'))
                        @guest
                            @include('include.disabledsearch')
                        @else
                            @include('include.searchform')
                        @endguest
                    @elseif (url()->full() === url('/login'))
                        @include('include.disabledsearch')
                    @elseif (url()->full() === url('/register'))
                        @include('include.disabledsearch')
                    @elseif (url()->full() === url('/search'))
                        {{-- @include('include.disabledsearch') --}}
                    @elseif (url()->full() === url('/me'))
                        {{-- @include('include.disabledsearch') --}}
                    @elseif (url()->full() === url('/new-story'))
                        {{-- @include('include.disabledsearch') --}}
                    @else
                        @include('include.searchform')
                    @endif

                    <!-- Sub menu -->
                    @guest
                        <div class="item padding-10px">
                            <a href="{{ url('#main-content') }}" class="ui secondary tertiary button">About</a>
                        </div>
                        <div class="item padding-10px">
                            <a href="{{ url('/login') }}" class="ui secondary tertiary button">Sign in</a>
                        </div>
                        <div class="item padding-10px">
                            <a href="{{ url('/register') }}" class="ui button custom padding-bt-nav">Get started</a>
                        </div>
                    @else
                        <!-- Dropdown -->
                        <div id="userDropdown" class="ui pointing dropdown item writer-user">
                            <span>{{ Auth::user()->name }}</span>
                            @if (Auth::user()->avatar === null)
                                <img src="{{ url('https://image.flaticon.com/icons/svg/2919/2919573.svg') }}" alt="user photo" class="ui avatar image">
                            @else
                                <img src="{{ Auth::user()->avatar }}" alt="user photo" class="ui avatar image">
                            @endif
                            <div class="menu">
                                <a href="{{ url('/new-story') }}" class="item">Create a story</a>
                                <a href="{{ url('/me') }}" class="item">Profile</a>

                                <a href="{{ route('logout') }}" class="item"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest

                </div>

            </div>
        </div>
    </header>
