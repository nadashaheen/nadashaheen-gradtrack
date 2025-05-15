@extends('student.layouts.master-student')
@section('title', 'Project Details')

@section('content')


        <div class="row mt-20">
            <div class="col-lg-12">
                <div>
                    <div class="primary-color fw-bold fs-20">{{$project->title}}</div>
                    <div>
                        <p>
                            Current Status: <span class="stauts-span"> In Progress</span>
                        </p>
                    </div>

                    <div class="project-phase-container m-10">
                        <div class="card p-10">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Project Phases</h5>
                            </div>

                            <div class="card-body">
                                <div class="each-phase d-flex align-items-center justify-content-between">
                                    <p class="card-text">Idea & Research Phase</p>
                                    <p class="card-text text-success">Completed</p>
                                </div>

                                <div class="each-phase d-flex align-items-center justify-content-between">
                                    <p class="card-text">Documentation Phase</p>
                                    <p class="card-text text-warning">In Progress</p>
                                </div>

                                <div class="each-phase d-flex align-items-center justify-content-between">
                                    <p class="card-text">UI/UX Phase</p>
                                    <p class="card-text text-muted">Not Started</p>
                                </div>

                                <div class="each-phase d-flex align-items-center justify-content-between">
                                    <p class="card-text">Frontend Phase</p>
                                    <p class="card-text text-muted">Not Started</p>
                                </div>

                                <div class="each-phase d-flex align-items-center justify-content-between">
                                    <p class="card-text">Backend Phase</p>
                                    <p class="card-text text-muted">Not Started</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
