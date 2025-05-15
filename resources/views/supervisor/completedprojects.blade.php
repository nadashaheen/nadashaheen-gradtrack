@extends('supervisor.layouts.master-supervisor')
@section('title', 'Complete Projects')

@section('content')
    <div class="completed-projects">
        <div class="container card-authntucation-color mt-20 p-20">
            <div class="head">
                <div class="d-flex flex-column">
                    <h3 class="mt-10 p-relative fs-18 primary-color fw-bold">
                        Completed Projects
                    </h3>
                    <p class="fs-16 m-10">
                        View finalized graduation projects with detailed information.
                    </p>
                    <form method="GET" action="{{route('do_search')}}" class="d-flex search-form" role="search">

                        <input name="search" VALUE="{{old('search')}}" class="form-control me-2 search" type="search"
                               placeholder="Search by project name or student name" aria-label="Search" />
                        <button class="btn main-btn" type="submit">Search</button>
                    </form>
                    <div class="dropdown mt-20">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter by Final Grade
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('filters', ['grade_order' => 'asc']) }}">Low to High</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('filters', ['grade_order' => 'desc']) }}">High to Low</a>
                            </li>
                        </ul>
                    </div>
                    <div></div>
                </div>
            </div>

            <div class="responsive-table mb-15">
                <table class="fs-15 w-full">
                    <thead>
                    <tr>
                        <td>Project Name</td>
                        <td>Student Name</td>
                        <td>Final Grade</td>
                        <td>Completion Date</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                        <td>{{$project->title}}</td>

                        <td>
                            {{ $project->student_name ?? 'No Student' }}
                        </td>
                        <td>
                            {{ $project->final_score ?? 'No score' }}
                        </td>
                        <td>
                            {{ $project->date ?? 'No score' }}
                        </td>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 75%">
                                </div>
                            </div>
                        </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
