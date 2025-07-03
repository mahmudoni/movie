<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    <script src="https://use.fontawesome.com/3db27005e3.js"></script>
    <link href="https://use.fontawesome.com/3db27005e3.css" media="all" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/v1/css/v1.css') }}">
    <script src="{{ asset('assets/v1/js/js.js') }}"></script>
	<meta name="theme-color" content="#161c23">
    @yield('header')
    @include('header')
</head>
<body>
    <div class="sign-in-overlay"></div>
    <div class="signin js-signin-form">
        <div class="signin_close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="signin_holder">

            <form id="signinfrom">
                <div class="h3">{{ __('signin.sign_in') }}</div>
                <div class="form-group">
                    <label for="signInEmail">{{ __('signin.email') }}</label>
                    <input type="email" class="form-control bg-dark border-dark text-secondary" id="signInEmail" aria-describedby="emailHelp" placeholder="{{ __('signin.enter_email') }}">
                    <small id="emailHelp" class="form-text text-muted">{{ __('signin.well_never_share') }}</small>
                </div>
                <div class="form-group">
                    <label for="signPassword">{{ __('signin.password') }}</label>
                    <input type="password" class="form-control bg-dark border-dark text-secondary" id="signPassword" placeholder="{{ __('signin.password') }}">
                </div>
                <div class="form-group">
                    <label id="forgotpass" class="form-check-label small text-muted cursor text-hover-theme" for="exampleCheck1">{{ __('signin.forgot_password') }}</label>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-light loading_signIn text-center mb-3 d-none" role="status">
                        <span class="sr-only">{{ __('signin.loading') }}</span>
                    </div>
                </div>

                <div class="text-danger sign-in-form-alert mb-3" role="alert"></div>

                <button type="submit" class="btn btn-outline-theme btn-block sign-in-submit">{{ __('signin.sign_in') }}</button>
                <div class="divider divider--small"></div>
                <div class="text-center">
                    <p class="text-small mb-3">{{ __('signin.or') }}</p>
                    <a href="{{ Mopie::route('loading') }}" class="btn btn-theme btn-block" type="button">{{ __('signin.create_free_account') }}</a>
                </div>
            </form>

            <form id="resetpassform">
                <div class="h3">{{ __('signin.reset_password') }}</div>
                <p class="text-muted">{{ __('signin.enter_your_email') }}</p>
                <div class="form-group">
                    <label for="resetEmail">{{ __('signin.email') }}</label>
                    <input type="email" class="form-control bg-dark border-dark text-secondary" id="resetEmail" aria-describedby="emailHelp" placeholder="{{ __('signin.enter_email') }}">
                </div>

                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-light loading_signIn text-center mb-3 d-none" role="status">
                        <span class="sr-only">{{ __('signin.loading') }}</span>
                    </div>
                </div>

                <div class="text-danger sign-in-form-alert mb-3" role="alert"></div>

                <button type="submit" class="btn btn-outline-theme btn-block mb-3">{{ __('signin.reset_password') }}</button>
                <div id="backToSignIn" class="text-center cursor">{{ __('signin.back_to_sign_in') }}</div>
            </form>

        </div>
    </div>

    @include(config('tmdb.theme').'._modal_lang')
    <nav class="navbar navbar-expand-lg navbar-dark navbar-mopie fixed-top">
        <a class="navbar-brand" href="{{ Mopie::route('home') }}">
            <img width="30" src="{{ asset('assets/v1/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ __('menu.movies') }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu mop" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-12">
                                <a class="dropdown-item" href="{{ Mopie::route('movie.popular') }}" title="{{ __('menu.popular') }}">{{ __('menu.popular') }}</a>
                                <a class="dropdown-item" href="{{ Mopie::route('movie.now.playing') }}" title="{{ __('menu.now_playing') }}">{{ __('menu.now_playing') }}</a>
                                <a class="dropdown-item" href="{{ Mopie::route('movie.top.rated') }}" title="{{ __('menu.top_rated') }}">{{ __('menu.top_rated') }}</a>
                                <a class="dropdown-item" href="{{ Mopie::route('movie.upcoming') }}" title="{{ __('menu.upcoming') }}">{{ __('menu.upcoming') }}</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ __('menu.tv_shows') }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu mop" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-12">
                                <a class="dropdown-item" href="{{ Mopie::route('tv.popular') }}" title="{{ __('menu.popular') }}">{{ __('menu.popular') }}</a>
                                <a class="dropdown-item" href="{{ Mopie::route('tv.top.rated') }}" title="{{ __('menu.top_rated') }}">{{ __('menu.top_rated') }}</a>
                                <a class="dropdown-item" href="{{ Mopie::route('tv.on.the.air') }}" title="{{ __('menu.on_tv') }}">{{ __('menu.on_tv') }}</a>
                                <a class="dropdown-item" href="{{ Mopie::route('tv.airing.to.day') }}" title="{{ __('menu.airing_today') }}">{{ __('menu.airing_today') }}</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ __('menu.genres') }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu px-3" aria-labelledby="dropdown04">
                        <div class="row">
                            @php
                                $genres = collect($genre_list)->chunk(10);
                            @endphp
                            <div class="col-6 px-0">
                                @foreach ($genres->first() as $item)
                                    <a class="dropdown-item" href="{{ Mopie::route('genre', ['id' => $item->getID(), 'slug' => str_slug($item->getName())]) }}" title="{{ $item->getName() }}">{{ $item->getName() }}</a>
                                @endforeach
                            </div>
                            <div class="col-6 px-0">
                                @foreach ($genres->last() as $item)
                                    <a class="dropdown-item" href="{{ Mopie::route('genre', ['id' => $item->getID(), 'slug' => str_slug($item->getName())]) }}" title="{{ $item->getName() }}">{{ $item->getName() }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Mopie::route('people.popular') }}" title="{{ __('menu.popular_people') }}">{{ __('menu.popular_people') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <form class="input-group my-2 my-md-0 mr-md-3 bg-faded" action="{{ Mopie::route('home') }}" method="GET">
                    <input type="text" class="form-control" name="s" placeholder="{{ __('menu.search') }}" aria-label="{{ __('menu.search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-search focus-no-sh" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
                <li class="nav-item">
                    <div class="nav-link cursor mb-3 mb-md-0" data-toggle="modal" data-target="#modalLang"><i class="fa fa-globe" aria-hidden="true"></i></div>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-theme ml-md-3 mb-3 mb-md-0 sign-in">{{ __('utilities.sign_in') }}</button>
                </li>
                <li class="nav-item">
                    <a href="{{ Mopie::route('loading') }}" class="btn btn-theme ml-md-3">{{ __('utilities.register') }}</i></a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="footer_wrapper d-flex flex-column flex-md-row">
                <div class="copyright">Copyright © {{ date('Y') }} <span class="text-capitalize">{{ $_SERVER['SERVER_NAME'] }}</span> | All rights
                    reserved</div>
                <div class="footer_links">
                    <a href="{{ route('page', ['page' => 'dmca']) }}">DMCA</a>
                    <a href="{{ route('page', ['page' => 'privacy-policy']) }}">Privacy Policy</a>
                    <a href="{{ route('page', ['page' => 'term-condition']) }}">Terms &amp; Condition</a>
                </div>
            </div>
        </div>
    </footer>

    @yield('footer')
    @include('footer')
</body>
</html>
