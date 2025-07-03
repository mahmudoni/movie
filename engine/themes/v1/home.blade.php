@extends(config('tmdb.theme').'.layouts')

@section('header')

@endsection

@section('content')
    <div class="jumbo-hero" style="background-image:url({{ '/assets/v1/images/bg.jpg' }})">
        <div class="container">
            <div class="jumbo-hero__inner">
                <h1 class="header">{{ __('section.title.home_1') }}</h1>
                <h3 class="text-large">{{ __('section.title.home_2') }}</h3>
                <a href="{{ Mopie::route('loading') }}" class="btn btn-outline-theme btn-lg mt-2 omh-goTo">{{ __('section.title.subscribe_to_watch') }}</a>
            </div>
        </div>
    </div>

    <section class="mopie-fade">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('movie.popular') }}" class="section-title" title="{{ __('section.title.popular') }}">{{ __('section.title.popular') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($movie_popular->getResults() as $item)
                    @include(config('tmdb.theme').'._item_movie', ['class' => ''])
                @endforeach
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('movie.now.playing') }}" class="section-title" title="{{ __('section.title.now_playing') }}">{{ __('section.title.now_playing') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($movie_now_playing->getResults() as $item)
                    @include(config('tmdb.theme').'._item_movie', ['class' => ''])
                @endforeach
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('movie.now.playing') }}" class="section-title" title="{{ __('section.title.movie_upcoming') }}">{{ __('section.title.movie_upcoming') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($movie_upcoming->getResults() as $item)
                    @include(config('tmdb.theme').'._item_movie', ['class' => ''])
                @endforeach
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('movie.now.playing') }}" class="section-title" title="{{ __('section.title.movie_top_rated') }}">{{ __('section.title.movie_top_rated') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($movie_top_rated->getResults() as $item)
                    @include(config('tmdb.theme').'._item_movie', ['class' => ''])
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('tv.popular') }}" class="section-title" title="{{ __('section.title.tv_popular') }}">{{ __('section.title.tv_popular') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($tv_popular->getResults() as $item)
                    @include(config('tmdb.theme').'._item_tv', ['class' => ''])
                @endforeach
            </div>

            <div class="divider"></div>

            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('tv.airing.to.day') }}" class="section-title" title="{{ __('section.title.tv_airing_today') }}">{{ __('section.title.tv_airing_today') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($tv_airing_today->getResults() as $item)
                    @include(config('tmdb.theme').'._item_tv', ['class' => ''])
                @endforeach
            </div>

            <div class="divider"></div>

            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('tv.airing.to.day') }}" class="section-title" title="{{ __('section.title.tv_on_the_air') }}">{{ __('section.title.tv_on_the_air') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($tv_on_the_air->getResults() as $item)
                    @include(config('tmdb.theme').'._item_tv', ['class' => ''])
                @endforeach
            </div>

            <div class="divider"></div>

            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h3 class="h4">
                        <a href="{{ Mopie::route('tv.airing.to.day') }}" class="section-title" title="{{ __('section.title.tv_top_rated') }}">{{ __('section.title.tv_top_rated') }} <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                    </h3>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($tv_top_rated->getResults() as $item)
                    @include(config('tmdb.theme').'._item_tv', ['class' => ''])
                @endforeach
            </div>
        </div>
    </section>
@endsection
