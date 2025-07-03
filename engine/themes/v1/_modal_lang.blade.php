<div class="modal fade" id="modalLang" tabindex="-1" role="dialog" aria-labelledby="modalLangLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <dib class="h5 modal-title text-dark" id="modalLangLabel">Choose your language:</dib>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @php
                        $loc = count(config('app.locales'));
                        $count = round(($loc / 2));
                    @endphp
                    <div class="col-12 col-md-6 px-0">
                        @foreach (collect(config('app.locales'))->chunk($count)->first() as $key => $locale)
                            @if ($key != config('app.locale'))
                                <a class="dropdown-item" href="{{ Mopie::route('locale.switch', ['locale' => $key]) }}" title="{{ $locale }}"><strong>{{ $locale }} <span class="text-secondary small">{{ $key }}</span></strong></a>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-12 col-md-6 px-0">
                        @foreach (collect(config('app.locales'))->chunk($count)->last() as $key => $locale)
                            @if ($key != config('app.locale'))
                                <a class="dropdown-item" href="{{ Mopie::route('locale.switch', ['locale' => $key]) }}" title="{{ $locale }}"><strong>{{ $locale }} <span class="text-secondary small">{{ $key }}</span></strong></a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
