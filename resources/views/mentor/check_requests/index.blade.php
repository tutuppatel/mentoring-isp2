@extends('layouts.master')

@section('content')

        <div class="block">
            <div class="block-content">

                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th>Mentee</th>
                            <th>Meeting Details</th>
                            <th>Preferred Date</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($meeting_requests as $details)
                            <tr>
                                <td class="font-w600"> {{ \App\Models\User::find($details->user_id)->name}}</td>
                                <td>{{$details->meeting_details}}</td>
                                <td>{{$details->meeting_date}}</td>
                                <td>
                                    @if($details->status === 0)
                                        <span class="badge badge-primary">Pending</span>
                                    @else
                                        <span class="badge badge-primary">Accepted</span>
                                    @endif
                                </td>
                                <td>{{$details->created_at->diffForHumans()}}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center text-danger font-w700">No requests made</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

@endsection
