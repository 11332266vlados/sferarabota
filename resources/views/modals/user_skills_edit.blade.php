<div class="modal fade" id="userSkillsEditModal" tabindex="-1" aria-labelledby="userSkillsEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/users/edit_skills') }}/{{$user['id']}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="userSkillsEditModalLabel">{{ __('auth.userEditSkills') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">выберите только 5 умений</p>
                    <div class="mb-3">
                        <select  class="form-select" size="10" multiple name="skills[]">
                            @foreach($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->name}}</option>
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
