@extends('supervisor.layouts.master-supervisor')
@section('title', 'Schedule Meetings')

@section('content')
    <div class="secdule-meetings">
        <div class="container card-authntucation-color mt-20 p-20">
            <div class="head">
                <div class="d-flex flex-column">
                    @include('student.layouts.masseges')

                    <h3 class="mt-10 p-relative fs-18 primary-color fw-bold">
                        Schedule Meetings
                    </h3>
                    <p class="fs-16 m-10">
                        View and manage all scheduled meetings with students. Add new
                        meetings as needed.
                    </p>
                </div>
            </div>

            <div class="responsive-table mb-15">

                <table class="fs-15 w-full">
                    <thead>
                    <tr>
                        <td>Meeting Title</td>
                        <td>Project Title</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Meeting Link</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($meetings)
                    @foreach($meetings as $meeting)
                        <tr>
                            <td>{{$meeting->title}}</td>
                            <td>{{ $meeting->project_name ?? 'N/A' }}</td>
                            <td>{{$meeting->meeting_date}}</td>
                            <td>{{$meeting->meeting_time}}</td>
                            <td><a href="{{$meeting->meeting_link}}">Join Meeting</a></td>
{{--                            <td><a href="{{route('meetings.destroy',$meeting)}}">Delete</a></td>--}}
                            <td><form style="float: left ; margin: 10px" method="post" action="{{route('meetings.destroy',$meeting->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    @endif

                    </tbody>
                </table>

            </div>

            <div class="mt-20 p-25">

                <h4 class="fs-18 fw-bold mb-10 primary-color">Add New Meeting</h4>
                <form class="row g-3" method="POST" action="{{route('meetings.store')}}">
                    @csrf
                    <div class="col-lg-12">
                        <label for="title" class="form-label">Meeting Title</label>
                        <input name="title" value="{{old('title')}}" type="text" class="form-control" id="title" placeholder="Enter meeting title" />
                    </div>
                    <div class="col-lg-12">
                        <label for="meeting_date" class="form-label">Date</label>
                        <input  name="meeting_date" value="{{old('meeting_date')}}" type="date" class="form-control" id="meeting_date" />
                    </div>
                    <div class="col-lg-12">
                        <label for="meeting_time" class="form-label">Time</label>
                        <input name="meeting_time" value="{{old('meeting_time')}}" type="time" class="form-control" id="meeting_time" />
                    </div>
                    <div class="col-lg-12">
                        <label for="meeting_link" class="form-label">Meeting Link</label>
                        <input name="meeting_link" value="{{old('meeting_link')}}" type="url" class="form-control" id="meeting_link" placeholder="Paste the meeting link" />
                    </div>

                    <div class="col-lg-12">
                        <label for="inputStatus">projects</label>
                        <select name="project_id" id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Select one</option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}" {{old('project_id') == $project->id ? 'selected' : ''}}>
                                    {{$project->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn main-btn mt-3 join-meeting-btn">
                            Join Meeting
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
