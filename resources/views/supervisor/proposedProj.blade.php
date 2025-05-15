@extends('supervisor.layouts.master-supervisor')
@section('title', 'Proposed Projects Dashboard')

@section('content')
    <div class="all-projects">
        <div class="container">
            <div class="table-head-container mb-20 ">
                <div class="head">
                    <div class=" d-flex  add-project-container">
                        <h3 class="text-center mt-10 p-relative fs-18 primary-color fw-bold fs-sm-20 mb-sm-10">Proposed Project List
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
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 75%">
                                        </div>
                                    </div>
                                </td>
                                <td  class="text-center" style="width: 20%; ">
                                    @if($project->status == 'proposed')
                                        <form method="post" action="{{route('accept' , $project->id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn text-success">✅ Attended</button>

                                </form>

                                        <form method="post" action="{{route('reject' , $project->id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>

                                    @elseif($project->status == 'accepted')
                                        <form method="post" action="{{route('accept' , $project->id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn text-success" disabled>✅ Attended</button>
                                        </form>
                                        <form method="post" action="{{route('reject' , $project->id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>

                                    @elseif($project->status == 'rejected')
                                        <form method="post" action="{{route('accept' , $project->id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn text-success" >✅ Attended</button>
                                        </form>


                                        <form method="post" action="{{route('reject' , $project->id)}}"  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger" disabled>Reject</button>
                                        </form>

                                    @endif
                                    {{--                                            {{$res->state == 'waiting' ? 'selected' : ''}}--}}


                                </td>
                        </tr>

                            @endforeach







                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>




@endsection
