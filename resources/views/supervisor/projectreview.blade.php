@extends('supervisor.layouts.master-supervisor')
@section('title', 'Project Review')

@section('content')
    <div class="project-evaluation">
        <div class="container">
            @include('student.layouts.masseges')

            <div class="header p-25">
                <h4 class="primary-color fw-bold fs-20">
                    Project Evaluation & Review
                </h4>
            </div>
            <div class="row gap-4">
                <div class="col-lg-12">
                    <div class="card p-10">
                        <div class="card-body p-10">
                            <h5 class="card-title fw-bold">Student Info</h5>
                        </div>

                        <div class="card-body p-10">
                            <div class="each-student-info d-flex align-items-center mb-2 gap-2">
                                <p class="card-text mb-0">Name:</p>
                                <p class="card-text">{{$student->name}}</p>
                            </div>

                            <div class="each-student-info d-flex align-items-center mb-2 gap-2">
                                <p class="card-text mb-0">Project Title:</p>
                                <p class="card-text">{{$project->title}}</p>
                            </div>

                            <div class="each-student-info d-flex align-items-center mb-2 gap-2">
                                <p class="card-text mb-0">Started Date:</p>
                                <p class="card-text">{{$project->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-12">
                    <div class="card p-10">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Uploaded Files</h5>
                        </div>

                        <div class="card-body">
                            @foreach($submissions as $submission)
                                @if($submission->status == 'Under Review')

                                <div class="each-phase d-flex align-items-center justify-content-between">
                                 <a href="{{route('showComments' , $submission->id )}}"><p class="card-text">{{ basename($submission->file_path) }}</p></a>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ asset($submission->file_path) }}" target="_blank">
                                            <i class="card-text fas fa-download text-primary fs-5" title="Download"></i>
                                        </a>

                                        <!-- نموذج الموافقة -->
                                        <form action="{{ route('submissions.update', $submission->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Accepted">
                                            <button type="submit" style="border: none; background: none;">
                                                <i class="card-text fas fa-check text-success fs-5" title="Approve"></i>
                                            </button>
                                        </form>

                                        <!-- نموذج الرفض -->
                                        <form action="{{ route('submissions.update', $submission->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Rejected">
                                            <button type="submit" style="border: none; background: none;">
                                                <i class="card-text fas fa-times text-danger fs-5" title="Reject"></i>
                                            </button>
                                        </form>


                                    </div>
                                </div>

                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>





                <div class="col-lg-12">
                    <div class="card p-10">
                        <div class="card-body">
                            <div class="each-phase d-flex align-items-center justify-content-between">
                                <p class="card-text fs-20 fw-bold ">{{$stage->status}}</p>
                                <form action="{{ route('projectStage.update', $stage->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary"> Complete </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="col-lg-12 mb-20">
                    @include('student.layouts.masseges')

                @if($final_project)
                        @if($evaluated_project)
                        <div class="card p-10">
                            <div class="each-phase d-flex mb-2 gap-2 flex-column">
                                <p class="card-text mb-0">
                                    <a href="{{ asset($final_project->pdf_file) }}" target="_blank">
                                        {{ basename($final_project->pdf_file) }}
                                    </a>
                                </p>

                            </div>

                            <div class="card-body p-10">
                                <h5 class="card-title fw-bold text-success">score = {{$evaluated_project->score}}</h5>
                            </div>

                        </div>
                        @else
                            <div class="card p-10">
                                <div class="card-body p-10">
                                    <h5 class="card-title fw-bold">Evaluation of the final project</h5>
                                </div>

                                <div class="card-body p-10">
                                    <div class="each-phase d-flex mb-2 gap-2 flex-column">
                                        <p class="card-text mb-0">
                                            <a href="{{ asset($final_project->pdf_file) }}" target="_blank">
                                                {{ basename($final_project->pdf_file) }}
                                            </a>
                                        </p>

                                    </div>

                                    <div class="each-phase d-flex align-items-center mb-2 gap-2">
                                        <form action="{{route('evaluate_final_project')}}" method="POST" class="w-100 gap-2">
                                            @csrf
                                            <input name="score" type="number" class="form-control" placeholder="Rate (1-100)" min="0"
                                                   max="100" required/>

                                            <div class="supervisor-textarea-container">
                                <textarea style="margin-top: 10px;" name="feedback" id="feedback" rows="4" class="form-control w-100"
                                          placeholder="Write your feedback here..."></textarea>

                                            </div>
                                            <input type="hidden" name="project_id" value="{{ $project->id }}">

                                            <button type="submit" class="btn main-btn " style="margin-top: 10px;float: right;margin-right: 5px;">Done</button>
                                        </form>
                                    </div>


                                </div>
                            </div>

                        @endif

                    @else
                        <div class="card p-10">
                            <div class="card-body p-10">
                                <h5 class="card-title fw-bold text-primary">final project not add yet</h5>
                            </div>

                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
