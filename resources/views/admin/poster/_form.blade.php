<div class="row">
    <div class="medium-8 columns">
        <div class="row">
            <label for="title" class="medium-2 columns control-label">
                Title
            </label>
            <div class="medium-10 columns">
                <input type="text" class="form-control" name="title" autofocus
                       id="title" value="{{ $title }}">
            </div>
        </div>

        <div class="row">
            <label for="notes" class="medium-2 columns control-label">
                Notes
            </label>
            <div class="medium-10 columns">
        <textarea class="form-control" name="notes" rows="14"
                  id="description">{{ $notes }}</textarea>
            </div>
        </div>

        <div class="row">
            <label for="image" class="medium-2 columns control-label">
                Image
            </label>
            <div class="medium-10 columns">
                <input type="text" class="form-control" name="image" autofocus
                       id="image" value="{{ $image }}">
            </div>
        </div>


    </div>

    <div class="medium-4 columns">
        <div class="row">
            <label for="publish_date" class="medium-3 columns control-label">
                Pub Date
            </label>
            <div class="medium-8 columns">
                <input class="form-control" name="publish_date" id="publish_date"
                       type="text" value="{{ $publish_date }}">
            </div>
        </div>
        <div class="row">
            <label for="publish_time" class="medium-3 columns control-label">
                Pub Time
            </label>
            <div class="medium-8 columns">
                <input class="form-control" name="publish_time" id="publish_time"
                       type="text" value="{{ $publish_time }}">
            </div>
        </div>
        <div class="row">
            <label for="dimension_height" class="medium-4 columns control-label">
                Dimensions
            </label>


            <div class="medium-4 columns">
                <div class="row collapse prefix-radius">
                    <div class="small-4 columns">
                        <span class="prefix">H</span>
                    </div>
                    <div class="small-8 columns">
                        <input type="text" class="form-control" name="dimension_height" autofocus
                               id="dimension_height" value="{{ $dimension_height }}">
                    </div>
                </div>
            </div>

            <div class="medium-4 columns">
                <div class="row collapse prefix-radius">
                    <div class="small-4 columns">
                        <span class="prefix">W</span>
                    </div>
                    <div class="small-8 columns">
                        <input type="text" class="form-control" name="dimension_width" autofocus
                               id="dimension_width" value="{{ $dimension_width }}">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <label for="slug" class="medium-3 columns control-label">
                Slug
            </label>
            <div class="medium-8 columns">
                <input type="text" class="form-control" name="slug" autofocus
                       id="slug" value="{{ $slug }}">
            </div>
        </div>

        <div class="row">


            <label for="draft" class="medium-3 columns control-label">
                Draft?
            </label>
            <div class="medium-8 columns">
                <input {{ checked($is_draft) }} type="checkbox" name="is_draft">
            </div>
        </div>
        <div class="row">
            <label for="tags" class="medium-3 columns control-label">
                Tags
            </label>
            <div class="medium-8 columns">
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach ($allTags as $tag)
                        <option @if (in_array($tag, $tags)) selected @endif
                        value="{{ $tag }}">
                            {{ $tag }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
</div>