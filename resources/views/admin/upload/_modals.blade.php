{{-- Create Folder Modal --}}
<div id="modal-folder-create" class="reveal-modal" data-reveal="data-reveal" aria-labelledby="folderCreate"
     aria-hidden="true" role="dialog">

    <form method="POST" action="/admin/upload/folder"
          class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">

        <div class="modal-header">
            <h4 class="modal-title">Create New Folder</h4>
        </div>

        <div class="form-group">
            <label for="new_folder_name" class="col-sm-3 control-label">
                Folder Name
            </label>

            <div class="col-sm-8">
                <input type="text" id="new_folder_name" name="new_folder"
                       class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Cancel
            </button>
            <button type="submit" class="btn btn-primary">
                Create Folder
            </button>
        </div>
    </form>

    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

{{-- Delete File Modal --}}
<div id="modal-file-delete" class="reveal-modal" data-reveal="data-reveal" aria-labelledby="fileDelete"
     aria-hidden="true" role="dialog">

    <p class="lead">
        <i class="fa fa-question-circle fa-lg"></i>
        Are you sure you want to delete the
        <kbd><span id="delete-file-name1">file</span></kbd>
        file?
    </p>

    <form method="POST" action="/admin/upload/file">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <input type="hidden" name="del_file" id="delete-file-name2">
        <button type="button" class="small" data-dismiss="modal"
                onclick="$('#modal-file-delete').foundation('reveal', 'close');">
            Cancel
        </button>
        <button type="submit" class="small alert">
            Delete File
        </button>
    </form>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

{{-- Delete Folder Modal --}}
<div id="modal-folder-delete" class="reveal-modal" data-reveal="data-reveal" aria-labelledby="folderDelete"
     aria-hidden="true" role="dialog">
    <p class="lead">
        <i class="fa fa-question-circle fa-lg"></i>
        Are you sure you want to delete the
        <kbd><span id="delete-folder-name1">folder</span></kbd>
        folder?
    </p>
    <form method="POST" action="/admin/upload/folder">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <input type="hidden" name="del_folder" id="delete-folder-name2">
        <button type="button" class="btn btn-default" data-dismiss="modal"
                onclick="$('#modal-folder-delete').foundation('reveal', 'close');">
            Cancel
        </button>
        <button type="submit" class="btn btn-danger">
            Delete Folder
        </button>
    </form>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

{{-- Upload File Modal --}}
<div id="modal-file-upload" class="reveal-modal" data-reveal="data-reveal" aria-labelledby="fileUpload"
     aria-hidden="true" role="dialog">

    <form method="POST" action="/admin/upload/file"
          class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">

        <div class="form-group">
            <label for="file" class="col-sm-3 control-label">
                File
            </label>

            <div class="col-sm-8">
                <input type="file" id="file" name="file">
            </div>
        </div>
        <div class="form-group">
            <label for="file_name" class="col-sm-3 control-label">
                Optional Filename
            </label>

            <div class="col-sm-4">
                <input type="text" id="file_name" name="file_name"
                       class="form-control">
            </div>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal"
                onclick="$('#modal-file-delete').foundation('reveal', 'close');">
            Cancel
        </button>
        <button type="submit" class="btn btn-primary">
            Upload File
        </button>
    </form>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

{{-- View Image Modal --}}
<div id="modal-image-view" class="reveal-modal" data-reveal="data-reveal" aria-labelledby="imageView"
     aria-hidden="true" role="dialog">
    <div class="modal-body">
        <img id="preview-image" src="x">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
        </button>
    </div>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>