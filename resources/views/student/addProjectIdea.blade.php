@extends('student.layouts.master-student')

@section('title', 'Add project idea')

@section('content')
    @include('student.layouts.masseges')

    @if ($projectExists)
        <div class="secdule-meetings student-meetings">
            <div class="container card-authntucation-color mt-20 p-20">
                <div class="row mt-20">
                    <div class="container">
                        <div class="col-lg-12">
                            <div class="upload-container d-flex align-items-center justify-content-center flex-column">
                                <button class="btn main-btn mb-3"  data-bs-toggle="modal" data-bs-target="#addProjectModal" disabled >
              <span class="icon-circle">
                <i class="fa-solid fa-plus primary-color"></i>
              </span>
                                    Add Project Idea
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

    @else
        <div class="secdule-meetings student-meetings">
            <div class="container card-authntucation-color mt-20 p-20">
                <div class="row mt-20">
                    <div class="container">
                        <div class="col-lg-12">
                            <div class="upload-container d-flex align-items-center justify-content-center flex-column">
                                <button class="btn main-btn mb-3"  data-bs-toggle="modal" data-bs-target="#addProjectModal"  >
              <span class="icon-circle">
                <i class="fa-solid fa-plus primary-color"></i>
              </span>
                                    Add Project Idea
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

    @endif
        <div class="modal fade " id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog card-authntucation-color">
            <div class="modal-content card-authntucation-color  p-20">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title primary-color fw-bold" id="addProjectModalLabel">Add New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="px-3 ">
                    <p class="p-15 mb-0">Enter the student's project details after approval.</p>
                </div>
<form id="addProjectForm" action="{{ route('add_idea') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="projectTitle" class="form-label">Project Title</label>
            <input name="projectTitle" type="text" class="form-control" id="projectTitle" required placeholder="Enter project title">
        </div>

        <div class="mb-3">
                <label for="projectDescription" class="fw-bold fs-16 mb-2 d-block">Project description:</label>
                <textarea name="projectDescription" id="projectDescription" rows="4" class="form-control w-100"
                          placeholder="Write your project description here..."></textarea>
        </div>

        <div class="mb-3">
            <label for="supervisor_id" class="form-label">Select Supervisor</label>
            <select class="form-select" id="supervisor_id" name="supervisor_id" required>
                <option value="">Choose a supervisor</option>
                @foreach ($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn main-btn">Add Project</button>
    </div>
</form>

            </div>
        </div>
    </div>


{{--    <div class="modal fade " id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog card-authntucation-color">--}}
{{--            <div class="modal-content card-authntucation-color  p-20">--}}
{{--                <div class="modal-header d-flex justify-content-between align-items-center">--}}
{{--                    <h5 class="modal-title primary-color fw-bold" id="addProjectModalLabel">Add New Project</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="px-3 ">--}}
{{--                    <p class="p-15 mb-0">Enter the student's project details after approval.</p>--}}
{{--                </div>--}}

{{--                <div class="modal-body">--}}
{{--                    <form id="addProjectForm">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="projectTitle" class="form-label">Project Title</label>--}}
{{--                            <input type="text" class="form-control" id="projectTitle" required placeholder="Enter project title">--}}
{{--                        </div>--}}


{{--                        <div class="mb-3">--}}
{{--                            <div class="row mt-20">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="upload-file p-20 m-10">--}}
{{--                                        <h5 class="fw-bold fs-18">File Upload</h5>--}}
{{--                                        <div class="">--}}
{{--                                                <div class="file-drop-area" id="file-drop-area">--}}
{{--                                                    <p>Drag & drop your files here or click to upload</p>--}}
{{--                                                    <input type="file" id="final-project-file" name="finalProjectFile"--}}
{{--                                                           accept=".pdf, .docx, .zip, .ppt, .pptx" multiple />--}}
{{--                                                </div>--}}
{{--                                                <div id="file-names" class="mt-3 text-center border-success"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <button type="submit" class="btn main-btn">Add Project</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
