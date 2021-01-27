@extends('layouts.master')

@section('content')
    <div class="row">
        @if($hasMentor)
            {{-- If you've selected a mentor --}}
            @include('mentee.sections.mentor_section')
        @else
            {{-- If you have no mentor come here --}}
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
