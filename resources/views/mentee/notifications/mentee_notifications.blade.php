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
                        @if($notification->type == 'App\Notifications\RequestStatus')
                            <li>
                                <div class="list-timeline-time">
                                    <i class="list-timeline-icon fa fa-check bg-info"></i>
                                    {{$notification->created_at->diffForHumans()}}
                                </div>
                                <div class="list-timeline-content">
                                    @if($notification->data['message'] === '')
                                        <p class="font-w600"><b>{{$notification->data['mentor']}}</b> has accepted your request</p>
                                    @else
                                        <h3 class="font-w600"><strong> Message from: {{$notification->data['mentor']}} </strong></h3>
                                        <p class="font-w600 ml-10">{{$notification->data['message']}}</p>
                                    @endif
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
