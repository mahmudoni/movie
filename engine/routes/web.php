<?php

Route::get('/', 'Frontend@home')->name('home');

Route::get('movie-popular', 'Frontend@moviePopular')->name('movie.popular');

Route::get('movie-now-playing', 'Frontend@movieNowPlaying')->name('movie.now.playing');

Route::get('movie-top-rated', 'Frontend@movieTopRated')->name('movie.top.rated');

Route::get('movie-upcoming', 'Frontend@movieUpcoming')->name('movie.upcoming');

Route::group(['prefix' => 'movie'], function () {

    Route::get('/', 'Frontend@movieNowPlaying');

    Route::get('{id}/{slug?}', 'Frontend@singleMovie')->where('id', '[0-9]+')->name('movie.single');
});

Route::get('tv-popular', 'Frontend@tvPopular')->name('tv.popular');

Route::get('tv-top-rated', 'Frontend@tvTopRated')->name('tv.top.rated');

Route::get('tv-airing-to-day', 'Frontend@tvAiringToday')->name('tv.airing.to.day');

Route::get('tv-on-the-air', 'Frontend@tvOnTheAir')->name('tv.on.the.air');

Route::group(['prefix' => 'tv'], function () {

    Route::get('/', 'Frontend@tvAiringToday')->name('tv');

    Route::get('{id}-{season}-{episode}/{slug?}', 'Frontend@singleTVSeasonEpisode')->where([
            'id' => '[0-9]+',
            'season' => '[0-9]+',
            'episode' => '[0-9]+'
        ])->name('tv.single.season.episode');

    Route::get('{id}-{season}/{slug?}', 'Frontend@singleTVSeason')->where([
        'id' => '[0-9]+',
        'season' => '[0-9]+'
        ])->name('tv.single.season');

    Route::get('{id}/{slug?}', 'Frontend@singleTV')->where('id', '[0-9]+')->name('tv.single');
});

Route::get('/genre/{id}/{slug?}', 'Frontend@genre')->where(['id' => '[0-9]+'])->name('genre');

Route::get('/keyword/{id}', 'Frontend@keyword')->where(['id' => '[0-9]+'])->name('keyword');


Route::group(['prefix' => 'person'], function () {
    Route::get('/{id}', 'Frontend@people')->where(['id' => '[0-9]+'])->name('people.single');

    Route::get('/popular', 'Frontend@peoplePopular')->name('people.popular');
});

Route::get('/search/{keyword}', 'Frontend@search')->name('search');

Route::get('loading', function () {
    return view(config('tmdb.theme').'.loading');
})->name('loading');

Route::get('/pages', function ($page = 1) {
    return $page;
})->name('pages');

Route::get('/sitemap-{page}.xml', function ($page = 1) {
    return $page;
});

Route::get('switch/{locale}', 'LocaleController@switch')->name('locale.switch');

Route::group(['prefix' => 'sitemap'], function () {
    Route::get('/', 'SitemapController@index');

    Route::group(['prefix' => 'movie'], function () {
        Route::get('/', 'SitemapController@index');
        Route::get('popular', 'SitemapController@moviePopular');
        Route::get('top-rated', 'SitemapController@movieTopRated');
        Route::get('upcoming', 'SitemapController@movieUpcoming');
        Route::get('now-playing', 'SitemapController@movieNowPlaying');
    });

    Route::group(['prefix' => 'tv'], function () {
        Route::get('/', 'SitemapController@index');
        Route::get('popular', 'SitemapController@tvPopular');
        Route::get('top-rated', 'SitemapController@tvTopRated');
        Route::get('on-tv', 'SitemapController@tvOnTheAir');
        Route::get('airing-today', 'SitemapController@tvAiringToday');
    });
});

Route::get('page/{page}', function ($page) {
    return view(config('tmdb.theme'). '.pages.index', compact('page'));
})->name('page');
Route::get('clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
});
