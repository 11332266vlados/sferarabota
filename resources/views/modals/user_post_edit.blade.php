<div class="modal fade" id="userPostEditModal" tabindex="-1" aria-labelledby="userPostEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/users/edit_post') }}/{{$user['id']}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="userPostEditModalLabel">{{ __('auth.userEditPost') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select" name="post_id">
                            @foreach($posts as $post)
                                <option value="{{$post->id}}">{{$post->name}}</option>
                            @endforeach
                        </select>
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
