@extends('student.layouts.master-student')
@section('title', 'My Meetings')

@section('content')
    <div class="secdule-meetings student-meetings">
        <div class="container card-authntucation-color mt-20 p-20">
            <div class="head">
                <div class="d-flex flex-column">
                    <h3 class="mt-10 p-relative fs-20 primary-color fw-bold">
                        My Meetings
                    </h3>
                    <p class="fs-16">
                        View all upcoming meetings with your supervisor. Click the meeting
                        link to join on time.
                    </p>
                </div>
            </div>

            <div class="upcoming-meeting-table-container mt-20">
                <h3 class="mt-10 p-relative fs-18 primary-color fw-bold">
                    Upcoming Meetings
                </h3>
                <div class="responsive-table mb-15">
                    <table class="fs-15 w-full">
                        <thead>
                        <tr>
                            <td>Meeting Title</td>
                            <td><i class="fa-solid fa-calendar-days"></i> Date</td>
                            <td><i class="fa-solid fa-clock"></i> Time</td>
                            <td><i class="fa-solid fa-link"></i> Meeting Link</td>

                        </tr>
                        </thead>
                        <tbody>
                        @if($project)
                            @foreach($meetings as $meeting)
                                <tr>

                                <td>{{$meeting->title}}</td>
                            <td>{{$meeting->meeting_date}}</td>
                            <td>{{$meeting->meeting_time}}</td>
                            <td><a target="_blank"  href="{{$meeting->meeting_link}}">Join Meeting</a></td>
                        </tr>
                            @endforeach

                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="history-meeting-table-container mt-20">
                <h3 class="mt-10 p-relative fs-18 primary-color fw-bold">
                    Previous Meetings
                </h3>
                <div class="responsive-table mb-15">
                    <table class="fs-15 w-full">
                        <thead>
                        <tr>
                            <td>Meeting Title</td>
                            <td><i class="fa-solid fa-calendar-days"></i> Date</td>
                            <td><i class="fa-solid fa-clock"></i> Time</td>

                        </tr>
                        </thead>
                        <tbody>
                        @if($project)

                            @foreach($meetings_left as $meeting)
                            <tr>

                                <td>{{$meeting->title}}</td>
                                <td>{{$meeting->meeting_date}}</td>
                                <td>{{$meeting->meeting_time}}</td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
