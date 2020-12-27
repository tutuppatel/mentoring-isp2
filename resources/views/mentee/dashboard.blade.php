@extends('layouts.master')

@section('content')
    <div class="row">
        @if($hasMentor)
            {{-- Show the mentor section --}}
            @include('mentee.modals.mentor_section')
        @else
            @forelse($mentors as $details)
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">{{$details->name}}</h3>
                            <h5 class="text-black-50">{{$details->email}}</h5>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">3,200</h5>
                                        <span class="description-text">SALES</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">35</h5>
                                        <span class="description-text">PRODUCTS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="justify-content-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#select-Mentor-{{$details->id}}">
                                        Select mentor
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                @include('mentee.modals.select_mentor')
            @empty
            @endforelse
        @endif

    </div>

@endsection
