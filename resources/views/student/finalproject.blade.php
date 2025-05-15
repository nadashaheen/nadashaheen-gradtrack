@extends('student.layouts.master-student')
@section('title', 'upload Final Project')

@section('content')
    <div class="add-final-project-container">
        <div class="container">
            @include('student.layouts.masseges')

            @if(!$project_final) {{-- لم يُرفع مشروع نهائي بعد --}}
            @if($stage && $stage->status == 'Backend Phase')
                {{-- عرض الفورم لرفع المشروع النهائي --}}
                <div class="uploaded-file-container">
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="upload-file p-20 m-10">
                                <h5 class="fw-bold fs-18">File Upload</h5>
                                <form action="{{route('add_final')}}" method="POST" enctype="multipart/form-data" id="submitfinalproject">
                                    @csrf
                                    <div class="file-drop-area" id="file-drop-area">
                                        <p>Drag & drop your files here or click to upload</p>
                                        <input type="file" id="final-project-file" name="file_path"
                                               accept=".pdf, .docx, .zip, .ppt, .pptx" multiple />
                                    </div>
                                    <div id="file-names" class="mt-3 text-center"></div>
                                    <button type="submit" class="btn main-btn">
                                        Submit for Review
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- لم يصل إلى المرحلة النهائية بعد --}}
                <div class="uploaded-file-container">
                    <h4 class="primary-color fw-bold fs-20">
                        The final project cannot be uploaded until you reach the final stage (Backend Phase).
                    </h4>
                </div>
            @endif
            @else
                {{-- عرض تفاصيل المشروع النهائي المرفوع سابقًا --}}
                <div class="uploaded-file-container">
                    <h4 class="primary-color fw-bold fs-20">Project Title</h4>

                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="uplodedfile p-20 m-10">
                                <h5 class="fw-bold fs-18">Uploaded Files</h5>
                                <div class="eachfile p-15">
                                    <a href="{{ asset($file_path) }}" target="_blank">
                                        {{ basename($file_path) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="p-20 m-10">
                                <h2 class="final-result text-success fw-bold text-center">
                                    @if($evaluation)
                                        {{$evaluation->score}} %
                                    @else
                                        Waiting Evaluation
                                    @endif
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
