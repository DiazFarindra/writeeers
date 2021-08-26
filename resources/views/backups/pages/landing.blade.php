@extends('layouts.main')

@section('title', 'Writeeers - landing page')

@section('content')
    <!-- HERO -->
    <div class="ui hero grid custom container mt-3rem">

        <div class="sixteen wide column">
            <div class="custom-hero-text">
                <p class="ui massive header text aligned center">
                    introducing
                </p>
                <p class="ui main header text aligned center">
                    Writeeers<span class="warna-oren">.</span>
                </p>
            </div>
        </div>

        <div class="ui sixteen wide column centered row">
            <a href="{{ url('/register') }}" class="ui custom-hero-button massive button">Get started</a>
        </div>

        <div class="ui sixteen wide column centered row">
            <div class="ui small hero header">Already have an account?
                <a href="{{ url('/login') }}">sign in.</a>
            </div>
        </div>

        <div class="two wide column"></div>
        <div class="twelve wide column">
            <img class="ui fluid move-updown margin-top image" src="{{ url('resource/please-be-patient.png') }}" alt="illustrations">
        </div>
        <div class="two wide column"></div>

        <div class="ui sixteen wide column centered row">
            <div class="ui horizontal list">

                <div class="item">
                    <i class="check circle icon"></i>
                    <div class="content">
                        <div class="header">World-class publications.</div>
                    </div>
                </div>

                <div class="item">
                    <i class="check circle icon"></i>
                    <div class="content">
                        <div class="header">Undiscovered voices.</div>
                    </div>
                </div>

                <div class="item">
                    <i class="check circle icon"></i>
                    <div class="content">
                        <div class="header">Topics you love.</div>
                    </div>
                </div>

                <div class="item">
                    <i class="check circle icon"></i>
                    <div class="content">
                        <div class="header">All on Writeeers, all for you.</div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- MAIN CONTENT -->
    <div id="main-content" class="ui main-content grid custom container mt-3rem">

        <!--? First Column -->
        <div class="ui six wide column centered row">
            <!-- Right Side -->
            <div class="ui first-header massive header text aligned left">
                For readers, writers, and the insatiably curious. Like you.
                <a href="{{ url('/login') }}" class="ui secondary tertiary massive button">Start exploring</a>
            </div>
        </div>

        <div class="ui ten wide column centered row">
            <!-- Left Side -->
            <img class="ui fluid image" src="{{ url('resource/technology.png') }}" alt="illustrations">
        </div>

        <!--? Second Column -->
        <div class="ui ten wide column centered row">
            <!-- Right Side -->
            <img class="ui fluid image" src="{{ url('resource/presentation.png') }}" alt="illustrations">
        </div>

        <div class="ui six wide column centered row">
            <!-- Left Side -->
            <div class="ui second-header massive header text aligned left">
                We love quality ideas — and writings
                <div class="sub header">
                    Stories published on <span class="ui text secondary">Writeeers.</span> should foster thinking that educates, inspires, and moves understanding forward.
                </div>
                <a href="{{ url('/') }}" class="ui secondary tertiary massive button">Learn more</a>
            </div>
        </div>

    </div>


    <!-- FOOTER -->
    <div class="ui top-footer grid custom container mt-3rem">

        <div class="sixteen wide column">
            <div class="custom-footer-text">
                <p class="ui massive header text aligned center">
                    Expand your reading,
                    Expand your mind. <br>
                    We are Writeeers.
                    after all.
                </p>
            </div>
        </div>

        <div class="ui sixteen wide column centered row">
            <a href="{{ url('/register') }}" class="ui custom-footer-button massive button">Get started</a>
        </div>

    </div>

    <div class="ui down-footer black inverted vertical segment">
        <div class="ui left aligned custom container">
            <div class="ui stackable inverted divided grid">
                <div class="four wide column left aligned">
                    <div class="ui inverted header">Account</div>
                    <div class="ui inverted link list">
                        <a href="{{ url('/login') }}" class="item">Sign in</a>
                        <a href="{{ url('/register') }}" class="item">Get started</a>
                        <a href="{{ url('https://instagram.com/diazfarindra_') }}" class="item">About me</a>
                    </div>
                </div>
                <div class="eight wide column left aligned">
                    <div class="ui inverted header">About Developers</div>
                    <p>Hi, My name <a href="{{ url('https://instagram.com/diazfarindra_') }}">Diaz Farindra</a> dah gini aja dulu gua binggung mau nulis apaan</p>
                </div>
            </div>
            <div class="ui inverted section divider"></div>
            <img src="{{ url('resource/writeeers-logo-inverted.png') }}" class="ui image" alt="logo">
            <div class="ui inverted mini header">
                <p>made with <i class="heart small icon"></i> by <a href="{{ url('https://instagram.com/diazfarindra_') }}">Diaz Farindra</a> | &copy;
                    <script>document.write(new Date().getUTCFullYear())</script> Writeeers. All rights reserved.</p>
            </div>
        </div>
    </div>

@endsection

@include ('include.footer')
@include('include.search')
