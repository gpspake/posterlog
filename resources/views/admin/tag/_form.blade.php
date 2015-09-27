<div class="form-group">
    <label for="title" class="col-md-3 control-label">
        Title
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="title"
               id="title" value="{{ $title }}">
    </div>
</div>

<div class="form-group">
    <label for="subtitle" class="col-md-3 control-label">
        Subtitle
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="subtitle"
               id="subtitle" value="{{ $subtitle }}">
    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="col-md-3 control-label">
        Meta Description
    </label>
    <div class="col-md-8">
    <textarea class="form-control" id="meta_description"
              name="meta_description" rows="3">{{
      $meta_description
    }}</textarea>
    </div>
</div>