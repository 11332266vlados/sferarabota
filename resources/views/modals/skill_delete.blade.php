<div class="modal fade" id="skillDeleteModal" tabindex="-1" aria-labelledby="skillDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/skills/delete') }}" method="post">

                <input type="hidden" class="form-control" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="skillDeleteModalLabel">{{ __('auth.skillDelete') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ __('auth.confirmDelete') }}
                </div>
                <div class="modal-footer">
                    @csrf
                    <button type="submit" class="btn btn-primary">{{ __('auth.Yes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
