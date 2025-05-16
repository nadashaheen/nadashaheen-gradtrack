@extends('supervisor.layouts.master-supervisor')
@section('title', 'All Projects Dashboard')

@section('content')
    <div class="all-projects">
        <div class="container">
            <div class="table-head-container mb-20 ">
                <div class="head">
                    <div class=" d-flex  add-project-container">
                        <h3 class="text-center mt-10 p-relative fs-18 primary-color fw-bold fs-sm-20 mb-sm-10">Student
                            Project List
                        </h3>
                    </div>
                </div>

                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Project Title</td>
                            <td>Status</td>
                            <td>Progress</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>

                        <!--  هاد ستايتك ولازم يتغير لداينمك لون البروقرس بار ولون نص الستيتس -->
                        @foreach($projects as $project)
                            <tr>

                                <td>
                                    {{ $project->student_name ?? 'No Student' }}
                                </td>
                                <td>{{$project->title}}</td>
                                <td class="status text-success">{{$project->status}}</td>
                                @php
                                    if ($progress < 25) {
                                        $color = 'bg-danger'; // أحمر
                                    } else
                                        if ($progress < 50) {
                                        $color = 'bg-warning'; // أصفر
                                    } elseif ($progress < 75) {
                                        $color = 'bg-info'; // أزرق
                                    } else {
                                        $color = 'bg-success'; // أخضر
                                    }
                                @endphp

                                <td>
                                    <div class="progress">
                                        <div class="progress-bar {{$color}}" style="width: {{$progress}}%">
                                            {{$progress}} %
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($project->status == 'proposed')
                                        watting accpte
                                    @else
                                    <a href="{{route('viewDetails_super' , $project->student_id)}}">
                                        View Details
                                    </a>
                                    @endif
                                </td>

                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-20">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header fw-bold">Upcoming Meetings</div>
                        @if($meetings)
                            <div class="responsive-table mb-15" style="margin-top: 0px">

                                <table class="fs-15 w-full">
                                    <thead>
                                    <tr>
                                        <td>Meeting Title</td>
                                        <td>Project Title</td>
                                        <td>Date</td>
                                        <td>Time</td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($meetings as $meeting)
                                        <tr>
                                            <td>{{$meeting->title}}</td>
                                            <td>{{ $meeting->project_title ?? 'N/A' }}</td>
                                            <td>{{$meeting->meeting_date}}</td>
                                            <td>{{$meeting->meeting_time}}</td>

                                        </tr>

                                    @endforeach


                                    </tbody>
                                </table>

                            </div>

                        @else
                            <div class="card-body">
                                <div class="each-deadline d-flex align-items-center justify-content-between">
                                    <p class="card-text p-15">No upcoming meetings scheduled.</p>

                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>



    <div class="modal fade " id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel"
         aria-hidden="true">
        <div class="modal-dialog card-authntucation-color">
            <div class="modal-content card-authntucation-color  p-20">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title primary-color fw-bold" id="addProjectModalLabel">Add New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="px-3 ">
                    <p class="p-15 mb-0">Enter the student's project details after approval.</p>
                </div>

            </div>
        </div>
    </div>

@endsection
