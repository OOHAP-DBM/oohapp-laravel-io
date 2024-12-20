<div class="form-group" id="title-section">
    <label>{{ __('Title')}} <span class="text-danger">*</span></label>
    <input type="text" value="{{ $row->title ?? 'title' }}" placeholder="title" name="title" class="form-control" required>
</div>
<div class="form-group" id="content-section">
    <label class="control-label">{{ __('Content')}} <span class="text-danger">*</span></label>
    <div class="" id="ckeditor">
        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10" >{{$row->content}}</textarea>
    </div>
    <div class="" id="textarea">
        <textarea name="content_text" class="" cols="30" rows="10" style="width: 100%;">{!! strip_tags($row->content) !!}</textarea>
    </div>
</div>