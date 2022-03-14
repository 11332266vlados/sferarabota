<div class="modal fade" id="usersFilterModal" tabindex="-1" aria-labelledby="usersFilterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/users') }}{{$getString}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="usersFilterModalLabel">{{ __('auth.usersFilterTitle') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input onchange="$('.filter-data').hide();$('.select-for-post').show();" class="form-check-input" type="radio" name="filter"
                               value="forPost" id="flexRadioPost" checked>
                        <label class="form-check-label" for="flexRadioPost">
                            {{ __('auth.usersFilterCheckboxPost') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input onchange="$('.filter-data').hide();$('.select-for-skills').show();" class="form-check-input" type="radio" name="filter"
                               value="forSkills" id="flexRadioSkills">
                        <label class="form-check-label" for="flexRadioSkills">
                            {{ __('auth.usersFilterCheckboxSkills') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input onchange="$('.filter-data').hide();$('.select-for-word').show();" class="form-check-input" type="radio" name="filter"
                               value="forWord" id="flexRadioWord">
                        <label class="form-check-label" for="flexRadioWord">
                            {{ __('auth.usersFilterCheckboxWord') }}
                        </label>
                    </div>
                    <br>


                    <div class="mb-3 filter-data select-for-post">
                        <select class="form-select" name="post_id">
                            @foreach($posts as $post)
                                <option value="{{$post->id}}">{{$post->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 filter-data select-for-skills" style="display: none;">
                        <select class="form-select" name="skill_id">
                            @foreach($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 filter-data select-for-word" style="display: none;">
                        <label class="form-label">{{ __('auth.FilterWord') }}</label>
                        <input type="text" class="form-control" name="word">
                    </div>
                </div>

                <div class="modal-footer">
                    @csrf
                    @if(isset($_POST['filter']))
                        <button type="button" onclick="location.href = location.href;" class="btn btn-primary">{{ __('auth.deleteFilters') }}</button>
                    @endif
                    <button type="submit" class="btn btn-primary">{{ __('auth.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
