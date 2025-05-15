@extends('student.layouts.master-student')
@section('title', 'Project Stage')

@section('content')
    @include('student.layouts.masseges')

    @php
        function getStatusBadge($status) {
            return match($status) {
                'Accepted' => '<p class="card-text text-success">✔ Accepted</p>',
                'Under Review' => '<p class="card-text text-warning">⏳ Under Review</p>',
                'Reject' => '<p class="card-text text-danger">🚫 Rejected</p>',
                default => '<p class="card-text text-muted">Unknown</p>',
            };
        }
    @endphp

    <div class="project-phases-container">
        <div class="container">

            <div class="uploadedfile mt-20">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="primary-color fw-bold fs-20">{{$stage->status}}</div>
                            <div>
                                <p>
                                    Current Status:
                                    <span class="stauts-span"> {{$project->status}} </span>
                                </p>
                            </div>

                            <div class="project-phase-container m-10">
                                <div class="card p-10">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">Uploaded Files</h5>
                                    </div>

                                    <div class="card-body">
                                        @if($lastSubmission)
                                            @foreach($lastSubmission as $submission)
                                                    <div class="each-phase d-flex align-items-center justify-content-between">
                                                        <p class="card-text">{{ basename($submission->file_path) }}
                                                          |  Submitted at: {{ $submission->created_at }}</p>
                                                        {!! getStatusBadge($submission->status) !!}

                                                    </div>

                                            @endforeach
                                        @else
                                            <div class="each-phase d-flex align-items-center justify-content-between">
                                                <p class="card-text text-warning">No Submission Yet</p>
                                            </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route('submissions.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upload-file p-20 m-10">
                            <h5 class="fw-bold fs-18">File Upload</h5>
                            <div class="file-drop-area" id="file-drop-area">
                                <p>Drag & drop your files here or click to upload</p>
                                <input type="file" id="final-project-file" name="file_path"
                                       accept=".pdf, .docx, .zip, .ppt, .pptx" multiple />
                            </div>
                            <div id="file-names" class="mt-3 text-center"></div>
                        </div>
                    </div>


                    <div class="col-lg-12 d-flex align-items-center justify-content-center m-10">
                        <button type="submit" class="btn main-btn">
                            Submit your Review
                        </button>
                    </div>

                    <div class="col-lg-12">
                        <div class="project-comment-container m-10">
                            <div class="card p-10">
                                <div class="card-header">
                                    <h5 class="card-title fw-bold">Comments</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-title fw-bold fs-18">Supervisor's Notes:</p>
                                    <p class="fs-14">
                                        Great work on the proposal! Please ensure you follow the
                                        guidelines for the development phase.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
