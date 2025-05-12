@extends('layouts.master-student')
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
                        <tr>
                            <td>Progress Discussion</td>
                            <td>12/10/2025</td>
                            <td>11:00 AM</td>
                            <td><a href="#">Join Meeting</a></td>
                        </tr>

                        <tr>
                            <td>Feedback Session</td>
                            <td>14/10/2025</td>
                            <td>2:00 PM</td>
                            <td><a href="#">Join Meeting</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="history-meeting-table-container mt-20">
                <h3 class="mt-10 p-relative fs-18 primary-color fw-bold">
                    Meeting History
                </h3>
                <div class="responsive-table mb-15">
                    <table class="fs-15 w-full">
                        <thead>
                        <tr>
                            <td>Meeting Title</td>
                            <td>Date & Time</td>
                            <td>Stauts</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Initial Meeting</td>
                            <td>10/10/2025 01:00 PM</td>
                            <td class="text-success fw-bold">✅ Attended</td>
                        </tr>

                        <tr>
                            <td>Midterm Review</td>
                            <td>05/10/2025 02:00 PM</td>
                            <td class="text-danger fw-bold">❌ Missed</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
