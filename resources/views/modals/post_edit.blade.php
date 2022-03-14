<div class="modal fade" id="postEditModal" tabindex="-1" aria-labelledby="postEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/posts/edit') }}" method="post">

                <input type="hidden" class="form-control" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="postEditModalLabel">{{ __('auth.PostEdit') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{ __('auth.PostName') }}</label>
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
