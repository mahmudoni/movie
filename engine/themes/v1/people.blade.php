@extends(config('tmdb.theme').'.layouts')

@section('content')
    <section class="mopie-fade">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2 mb-3">
                    <img class="img-fluid rounded" src="{{ Mopie::imgPoster($data->getProfilePath()) }}" alt="{{ $data->getName() }}">
                </div>
                <div class="col-12 col-md-10">
                    <h1 class="h3 mb-4">{{ $data->getName() }}</h1>
                    <div class="h6">{{ __('utilities.biography') }}</div>
                    <p class="text-muted" style="max-height: 200px; overflow:auto">{{ $data->getBiography() }}</p>
                    <div class="entry-table">
                        <ul>
                            <li>{{ __('utilities.know_for') }}: <span>{{ $data->getKnownForDepartment() }}</span></li>
                            <li>{{ __('utilities.birthday') }}: <span>{{ $data->getBirthday() }}</span></li>
                            <li>{{ __('utilities.place_of_birth') }}: <span>{{ $data->getPlaceOfBirth() }}</span></li>
                            <li>{{ __('utilities.also_know_as') }}: <span>{{ $data->getAlsoKnownAs() }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container p-3 p-md-4 rounded-lg mb-5">
            <div class="row">
                {{-- {{ dd($data) }} --}}
                <div class="col-12 mb-4">
                    <h3 class="h4">{{ __('section.title.movie_list_of', ['name' => $data->getName()]) }}</h3>
                </div>
                @foreach ($data->getMovieCreditCasts() as $item)
                    @include(config('tmdb.theme').'._item_movie', ['class' => 'col-6 col-md-2'])
                @endforeach
            </div>
        </div>
    </section>
@endsection
