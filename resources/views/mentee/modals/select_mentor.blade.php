<div class="modal fade" id="select-Mentor-{{$details->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select mentor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select {{$details->name}} as your mentor, the action can be reverted later
            </div>
            <form action="/select_mentor/{{$details->id}}" method="post">
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Select</button>
                </div>
            </form>
        </div>
    </div>
</div>
