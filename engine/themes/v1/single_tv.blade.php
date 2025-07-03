@extends(config('tmdb.theme').'.layouts')

@php
    $this_episode = isset($episode_info) ? $episode_info->getEpisodeNumber() : false;
@endphp

@section('footer')
    <script src="{{ asset('/assets/v1/js/s.js') }}"></script>
@endsection

@section('content')
    <section class="px-4r">
        <div class="backdrop" style="background-image: url({{ $backdrop }})"></div>
        <div class="container">
            @include(config('tmdb.theme').'._player', ['backdrop' => $backdrop, 'video' => asset('/assets/v1/video/tv.mp4')])
            <script>var playDuration = 45*60;</script>
        </div>

        <div class="container py-4">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a href="{{ Mopie::route('loading', ['id' => $tv->getID() ,'title' => $tv->getName()]) }}" class="btn btn-outline-theme mx-1">{{ __('utilities.watch_now') }} <i class="fa fa-film" aria-hidden="true"></i></a>
                    <a href="{{ Mopie::route('loading', ['id' => $tv->getID() ,'title' => $tv->getName()]) }}" class="btn btn-outline-theme mx-1">{{ __('utilities.download') }} <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-3">
                        <img class="img-fluid" src="{{ Mopie::imgPoster($tv->getPoster()) }}" alt="">
                    </div>
                    <div class="col-md-10 col-sm-8 col-9">
                        <div class="entry-title d-flex flex-column-reverse flex-md-row justify-content-between">
                            <h1 class="h3">{{ $title }} <span class="tiny text-muted">{{ $season_info->getYear() }}</span></h1>
                            <div class="sub-r">
                                <a href="#" class="btn subs">{{ __('utilities.subscribe_watch') }}</a>
                            </div>
                        </div>
                        <div class="entry-info mb-3">
                            <div class="__rate">
                                @for ($i = 0; $i < 10; $i++)
                                    @if ($i < round($tv->getVoteAverage()))
                                        <i class="fa fa-star text-warning"></i>
                                    @else
                                        <i class="fa fa-star-o text-muted"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="__info">
                                <span class="text-muted small">{{ $tv->getVoteAverage() }}/10</span> <span class="text-muted small">{{ __('utilities.by') }} {{ $tv->getVoteCount() }} {{ __('utilities.users') }}</span>
                            </div>
                        </div>
                        <div class="entry-desciption text-muted">
                            <p>{{ $overview }}</p>
                        </div>
                        <div class="entry-table">
                            <ul>
                                @if ($type == 'tv')
                                    <li>{{ __('utilities.released') }}: <span>{{ $tv->getFirstAirDate() }}</span></li>
                                @elseif($type == 'season')
                                    <li>{{ __('utilities.released') }}: <span>{{ $season_info->getAirDate() }}</span></li>
                                @else
                                    <li>{{ __('utilities.released') }}: <span>{{ $episode_info->getAirDate() }}</span></li>
                                @endif
                                <li>{{ __('utilities.runtime') }}: <span>{{ $tv->getEpisodeRunTime() }} {{ __('utilities.minutes') }}</span></li>
                                <li>{{ __('utilities.genre') }}: <span>{{ $tv->getGenreComma() }}</span></li>
                                <li>{{ __('utilities.stars') }}: <span>{!! $tv->getStarComma(5) !!}</span></li>
                                <li>{{ __('utilities.director') }}: <span>{!! $tv->getDirectorComma(5) !!}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="episodes">
                            <div>
                                <ul class="nav nav-tabs" id="episodesTab" role="tablist" style="width: 793px;">
                                    @foreach (collect($tv->getSeasons())->sortKeysDesc()->all() as $item)
                                        @if ($item->getSeasonNumber() == $season)
                                            <li class="nav-item">
                                                <a href="#" class="nav-link active" id="season-{{ $item->getSeasonNumber() }}-tab">
                                                    {{ __('utilities.season') }} {{ $item->getSeasonNumber() }}
                                                </a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a href="{{ Mopie::route('tv.single.season', ['id' => $tv->getID(), 'season' => $item->getSeasonNumber(), 'slug' => str_slug($tv->getOriginalName())]) }}" class="nav-link" id="season-{{ $item->getSeasonNumber() }}-tab">
                                                    {{ __('utilities.season') }} {{ $item->getSeasonNumber() }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content episodes_list" id="episodesTabContent">
                            <div class="tab-pane fade show active" id="season-{{$tv->getNumSeasons()}}" role="tabpanel" aria-labelledby="season-{{$tv->getNumSeasons()}}-tab">
                                <ul>
                                    @foreach ($season_select as $item)
                                        @if ($item->getEpisodeNumber() == $this_episode)
                                            <li class="dark">
                                        @else
                                            <li>
                                        @endif
                                            <div class="episodes_list_item">
                                                <div>
                                                    <a class="episodes_list_episode" href="{{ Mopie::route('tv.single.season.episode', ['id'=>$tv->getID(), 'season'=>$season, 'episode'=>$item->getEpisodeNumber(), 'slug' => str_slug($tv->getORiginalName().' '.$item->getName()) ]) }}" title="{{ $item->getName() }}">{{$item->getEpisodeNumber() }}. {{ $item->getName() }}</a>
                                                    <span class="episodes_list_release">{{ $item->getAirDate() }}</span>
                                                </div>
                                                <div>
                                                    <a class="episodes_list_watch" href="{{ Mopie::route('tv.single.season.episode', ['id'=>$tv->getID(), 'season' => $season, 'episode'=>$item->getEpisodeNumber(), 'slug' => str_slug($tv->getORiginalName().' '.$item->getName()) ]) }}"><i class="fa fa-lg fa-play-circle"></i> <span>{{ __('utilities.watch') }}</span></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
        <div class="h6">Download : <strong class="text-color-theme">MKV</strong></div>
        <ul class="down-list mb-4">
            <li>
                <div class="dt"><strong>360p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>480p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>720p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>1080p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
        </ul>
        <div class="h6">Download : <strong class="text-color-theme">MP4</strong></div>
        <ul class="down-list">
            <li>
                <div class="dt"><strong>360p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>480p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>MP4HD</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>FULLHD</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
        </ul>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="h4">{{ __('section.title.similar') }}</h3>
            </div>
        </div>
        <div class="owl-carousel">
            @foreach ($tv->getSimilars() as $item)
                @include(config('tmdb.theme').'._item_tv', ['class' => ''])
            @endforeach
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="h4">{{ __('section.title.recommendation') }}</h3>
            </div>
        </div>
        <div class="owl-carousel">
            @foreach ($tv->getRecommendations() as $item)
                @include(config('tmdb.theme').'._item_tv', ['class' => ''])
            @endforeach
        </div>
    </section>

    @include(config('tmdb.theme').'._modal_watch', ['backdrop' => $backdrop, 'id' => $tv->getID(), 'title' => $tv->getName()])
@endsection
