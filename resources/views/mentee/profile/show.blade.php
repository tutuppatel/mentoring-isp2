@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        @foreach($profile as $data)
                        <h3 class="profile-username text-center">{{$data->firstname}}</h3>

                        <p class="text-muted text-center">{{$data->course}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Tel no</b> <a class="float-right">{{$data->tel_no}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Student ID</b> <a class="float-right">{{$data->student_id}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Faculty</b> <a class="float-right">{{$data->faculty}}</a>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">My profile</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                @foreach($profile as $data)
                                    <form action="/profile/{{$data->user_id}}/edit" method="post" class="form-horizontal">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" name="firstname" class="form-control" placeholder="" value="{{$data->firstname}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle name</label>
                                            <input type="text" name="middlename" class="form-control" placeholder="" value="{{$data->middlename}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="text" name="lastname" class="form-control" value="{{$data->lastname}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Tel no</label>
                                            <input type="tel" name="tel_no" class="form-control" placeholder="0712-345-678" value="{{$data->tel_no}}">
                                            @error('tel_no')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Student ID</label>
                                            <input type="number" name="student_id" pattern="[0-9]{6}" placeholder="123-456" class="form-control" value="{{$data->student_id}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Course</label>
                                            <input type="text" name="course" class="form-control" value="{{$data->course}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Faculty</label>
                                            <input type="text" name="faculty" class="form-control" value="{{$data->faculty}}" readonly>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </div>
                                </form>
                                @endforeach
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </div>

@endsection
