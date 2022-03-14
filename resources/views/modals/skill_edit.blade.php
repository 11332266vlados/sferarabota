<div class="modal fade" id="skillEditModal" tabindex="-1" aria-labelledby="skillEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/skills/edit') }}" method="post">

                <input type="hidden" class="form-control" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="skillEditModalLabel">{{ __('auth.skillEdit') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{ __('auth.skillName') }}</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="modal-footer">
                    @csrf
                    <button type="submit" class="btn btn-primary">{{ __('auth.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
