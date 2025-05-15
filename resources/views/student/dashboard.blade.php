@extends('student.layouts.master-student')
@section('title', 'Student Dashboard')

@section('content')
    <!-- start wrapper -->
    <div class="wrapper mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('student.layouts.masseges')

                    <div class="card">
                        @if($project)
                            <div class="card-header">Project Overview</div>
                            <div class="card-body">
                                <h5 class="card-title">{{$project->title ?? 'No Project Yet'}}</h5>
                                <p class="card-text">
                                    Current Status: <span class="stauts-span"> {{$project->status ?? 'No Project Yet'}}</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width: 75%">
                                        75%
                                    </div>
                                </div>
                            </div>
                        @else
                            <h3 class="text-center text-primary" style="margin: 30px">No Project Yet</h3>
                        @endif

                    </div>
                </div>
            </div>

            <div class="row mt-20">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Upcoming Deadlines</div>
                        <div class="card-body">
                            <div class="each-deadline d-flex align-items-center justify-content-between">
                                <p class="card-text">Research Proposal Submission</p>
                                <p class="card-text">Due: 2023-10-15</p>
                            </div>

                            <div class="each-deadline d-flex align-items-center justify-content-between">
                                <p class="card-text">Research Proposal Submission</p>
                                <p class="card-text">Due: 2023-10-15</p>
                            </div>

                            <div class="each-deadline d-flex align-items-center justify-content-between">
                                <p class="card-text">Research Proposal Submission</p>
                                <p class="card-text">Due: 2023-10-15</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-20">
                <div class="container">
                    <div class="col-lg-12">
                        <div class="upload-container d-flex align-items-center justify-content-center flex-column">
                            <button class="btn main-btn mb-3" id="uploadBtn">
                                Upload New Submission
                            </button>

                            <input type="file" id="fileInput" style="display: none"
                                   onchange="handleFileUpload(event)" />

                            <p id="uploadedFileName" class="text-success fw-bold"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
@endsection
