@extends('layouts.master')

@section('content')

<form action="/profile" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" name="firstname" class="form-control" placeholder="" value="{{old('firstname')}}">
            @error('firstname')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Middle name</label>
            <input type="text" name="middlename" class="form-control" placeholder="" value="{{old('middlename')}}">
            @error('middlename')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Lastname</label>
            <input type="text" name="lastname" class="form-control" value="{{old('lastname')}}">
            @error('lastname')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Tel no</label>
            <input type="tel" name="tel_no" class="form-control" placeholder="0712-345-678" value="{{old('tel_no')}}">
            @error('tel_no')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Student ID</label>
            <input type="number" name="student_id" pattern="[0-9]{6}" placeholder="123-456" class="form-control" value="{{old('student_id')}}">
            @error('student_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Course</label>
            <input type="text" name="course" class="form-control" value="{{old('course')}}">
            @error('course')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Faculty</label>
            <input type="text" name="faculty" class="form-control" value="{{old('faculty')}}">
            @error('faculty')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>




@endsection
