@extends('student.layouts.master-student')
@section('title', 'Project Details')

@section('content')


    <div class="row mt-20">
        <div class="col-lg-12">
            <div>
                <div class="primary-color fw-bold fs-20">{{$project->title}}</div>
                <div>
                    <p>
                        Current Status: <span class="stauts-span">{{$project->status}}</span>
                    </p>
                </div>

                @php
                    $phases = [
                        'Idea & Research Phase',
                        'Documentation Phase',
                        'UI/UX Phase',
                        'Frontend Phase',
                        'Backend Phase',
                    ];
    $currentPhaseIndex = array_search($stage->status, $phases);

                @endphp

                <div class="project-phase-container m-10">
                    <div class="card p-10">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Project Phases</h5>
                        </div>

                        <div class="card-body">
                            @foreach ($phases as $index => $phase)
                                <div class="each-phase d-flex align-items-center justify-content-between">
                                    <p class="card-text">{{ $phase }}</p>

                                    @if ($index < $currentPhaseIndex)
                                        <p class="card-text text-success">Completed</p>
                                    @elseif ($index == $currentPhaseIndex)
                                        <p class="card-text text-warning">In Progress</p>
                                    @else
                                        <p class="card-text text-muted">Not Started</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
