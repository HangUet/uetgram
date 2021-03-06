<!-- Modal -->
<div class="modal fade" id="newAlbumModalRoot" role="dialog">
	<div class="modal-dialog">
				
	<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Album</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('album.store',[0]) }}" method="POST" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label class="form-label" for="title">Title:</label>
                    <input class="form-control" type="text" placeholder="Title" name="title" required></br>
                    </br>
                    <div class="form-group" style="text-align: center">                   
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>