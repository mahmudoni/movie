@extends(config('tmdb.theme').'.layouts')

@section('content')
    <div class="jumbo-hero" style="background-image:url({{ '/assets/v1/images/bg.jpg' }})">
        <div class="container">
            <div class="jumbo-hero__inner">
                <h1 class="header">{{ $title }}</h1>
            </div>
        </div>
    </div>

    <section class="mopie-fade">
        <div class="container">
            <div class="row">
                @foreach ($data as $item)
                    @if ($type == 'tv')
                        @include(config('tmdb.theme').'._item_tv', ['class' => 'col-6 col-md-2'])
                    @elseif($type == 'people')
                        @include(config('tmdb.theme').'._item_person', ['class' => 'col-6 col-md-2'])
                    @else
                        @include(config('tmdb.theme').'._item_movie', ['class' => 'col-6 col-md-2'])
                    @endif
                @endforeach
            </div>

            <div class="row">
                <div class="col-12 text-center pagenate">
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
