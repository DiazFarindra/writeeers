<div class="item">
    <form method="POST" action="{{ url('/search') }}" role="search" style="margin-top: 11px">
        @csrf
        <div class="ui search">
            <div class="ui transparent left icon input">
                <input class="prompt" name="q" type="text" placeholder="Search story..." autofocus>
                <i class="search link icon"></i>
            </div>
            <div class="results"></div>
        </div>
        <button type="submit" style="display: none"></button>
    </form>
</div>
