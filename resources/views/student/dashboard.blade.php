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
                                    Current Status: <span class="stauts-spa text-primary"> {{$project->status ?? 'No Project Yet'}}</span>
                                </p>
                                @php
                                    if ($progress < 25) {
                                        $color = 'bg-danger'; // أحمر
                                    } elseif ($progress < 50) {
                                        $color = 'bg-warning'; // أصفر
                                    } elseif ($progress < 75) {
                                        $color = 'bg-info'; // أزرق
                                    } else {
                                        $color = 'bg-success'; // أخضر
                                    }
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar {{$color}}" style="width: {{$progress}}%">
                                        {{$progress}}%
                                    </div>
                                </div>
                            </div>
                        @else
                            <h3 class="text-center text-primary" style="margin: 30px">No Project Yet</h3>
                        @endif

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- end wrapper -->
@endsection
