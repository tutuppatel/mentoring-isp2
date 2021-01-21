@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="block mt-30">
            <div class="block-header block-header-default">
                <h3 class="block-title">Notifications</h3>
                <div class="block-options">
                </div>
            </div>
            <div class="block-content">
                <ul class="list list-timeline pull-t">
                    @forelse($notifications as $notification)
                        @if($notification->type == 'App\Notifications\MeetingRequests')
                            <li>
                                <div class="list-timeline-time">{{$notification->created_at->diffForHumans()}}</div>
                                <i class="list-timeline-icon fa fa-check bg-info"></i>
                                <div class="list-timeline-content">
                                    <p class="font-w600">'{{$notification->data['mentee']}}' has been requested for a session</p>
                                </div>
                            </li>
                        @endif
                    @empty
                        <div class="list-timeline-content">
                            <p class="font-w600">You currently have no notifications</p>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
