<div class="modal fade" id="userAdminAddModal" tabindex="-1" aria-labelledby="userAdminAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/users/set_admin') }}/{{$user['id']}}" method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="userAdminAddModalLabel">{{ __('auth.adminAdd') }}</h5>
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
