<div id="modal-watch" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mopie-modal-content p-0 border" style="background-image: url('{{ $backdrop }}')">
                <div class="align-items-center d-flex flex-column justify-content-center position-relative p-3 pt-5 text-center">
                    <div class="ex-icon">
                        <i class="fa fa-exclamation fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="h3 font-bold mt-3">{{ __('modal.active_your_account_free') }}</div>
                    <p>{{ __('modal.you_must_create') }}</p>
                    <a href="{{ Mopie::route('loading', ['id' => $id ,'title' => $title]) }}" class="btn btn-lg bg-theme bg-hover-theme mb-4">{{ __('modal.continue_watch') }}</a>
                </div>
            </div>
            <div class="modal-footer align-items-center d-flex flex-column justify-content-center text-center text-dark">
                <p class="text-large mb-1"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i><span class="text-large font-bold" style="font-weight: 700">{{ __('modal.quick_sign_up') }}</span></p>
                <p class="small">{{ __('modal.take_less_then') }}</p>
            </div>
        </div>
    </div>
</div>
