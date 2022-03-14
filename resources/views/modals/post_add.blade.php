<div class="modal fade" id="postAddModal" tabindex="-1" aria-labelledby="postAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/posts/add') }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="postAddModalLabel">{{ __('auth.PostAdd') }}</h5>
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
