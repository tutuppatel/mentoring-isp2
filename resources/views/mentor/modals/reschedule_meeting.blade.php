<div class="modal fade" id="reschedule-{{$details->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reschedule meeting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/reschedule_meeting/{{$details->id}}" method="post">
                    @csrf
                    <div class="col-sm-10">
                        <textarea name="reschedule_meeting" rows="10" cols="30"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"> <i class="fas fa-send"></i> Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
