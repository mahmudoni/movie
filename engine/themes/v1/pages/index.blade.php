@extends(config('tmdb.theme').'.layouts')

@section('header')
    <title>{{ title_case(str_replace('-', ' ', $page)) }}</title>
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include(config('tmdb.theme'). '.pages.'.$page)
            </div>
        </div>
    </div>
</section>
@endsection
