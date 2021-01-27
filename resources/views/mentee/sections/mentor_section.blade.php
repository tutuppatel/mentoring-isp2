<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    @forelse($mentor as $details)
                    <h3 class="profile-username text-center">{{$details->name}}</h3>

                    <p class="text-muted text-center">{{$details->email}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">

                        </li>
                    </ul>
                    @empty

                    @endforelse

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Posts</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#request-meeting" data-toggle="tab">Request meeting</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        @if($status === 'pending')
                            <div class="tab-pane" id="request-meeting">
                                <div class="alert alert-info">
                                    <i class="fa fa-info mr-3"></i> Appointment pending approval.
                                </div>
                            </div>
                        @else
                            <div class="tab-pane" id="request-meeting">
                                <form action="/request_meeting" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Meeting details</label>
                                        <div class="col-sm-10">
                                            <textarea name="meeting_details" rows="10" cols="30"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Meeting Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" name="meeting_date">
                                        </div>
                                    </div>
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><
