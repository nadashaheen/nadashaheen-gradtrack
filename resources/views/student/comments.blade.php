@extends('student.layouts.master-student')
@section('title', 'Submission Comments')

@section('content')
    <div class="project-evaluation">
        <div class="container">
            @include('student.layouts.masseges')

            <div class="col-lg-12">
                <div class="project-comment-container m-10">
                    <div class="card p-10">
                        <div class="card-header">
                            <h5 class="card-title fw-bold">Submission Comments</h5>
                        </div>

                        {{-- قائمة التعليقات --}}
                        <div class="mt-3">
                            @if($comments)
                                @foreach ($comments as $comment)
                                    @if($comment->user_role == 'supervisor')
                                        <div class="border rounded p-2 mb-2 bg-light">

                                            <strong>{{$comment->user_role}}: {{ $comment->user_name }} </strong><span>|| {{ $comment->content }}</span>
                                            <small class="text-muted">({{ $comment->created_at }})</small>
                                        </div>
                                    @else
                                        <div class="border rounded p-2 mb-2"style="background-color:#dfe3e9">

                                            <strong>{{$comment->user_role}}: {{ $comment->user_name }} </strong><span>|| {{ $comment->content }}</span>
                                            <small class="text-muted">({{ $comment->created_at }})</small>
                                        </div>
                                    @endif

                                @endforeach
                            @endif
                        </div>

                        {{-- نموذج التعليق --}}
                            <form action="{{ route('comments.store') }}" method="POST" class="mt-3">
                                @csrf
                                <input type="hidden" name="submission_id" value="{{ $submission->id }}">

                                <div class="mt-2 supervisor-textarea-container position-relative">
                    <textarea name="content" id="supervisorReply" rows="4"
                              class="form-control w-100" placeholder="Write your reply here..." required></textarea>

                                    <button type="submit"
                                            class="btn btn-link top-0 end-0 mt-2 me-2 text-primary"
                                            title="Send">
                                        <i class="fas fa-paper-plane fs-16"></i>
                                    </button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>

@endsection
