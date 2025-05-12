@extends('layouts.master-student')
@section('title', 'Final Project')

@section('content')
    <div class="add-final-project-container">
        <div class="container">
            <div class="header p-25">
                <div class="d-flex align-items-center gap-1">
                    <p class="fs-18 primary-color mb-0">Home></p>
                    <span> Add Final Project</span>
                </div>
            </div>

            <div class="uploaded-file-container">
                <div>
                    <h4 class="primary-color fw-bold fs-20">Project Title</h4>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="uplodedfile p-20 m-10">
                            <h5 class="fw-bold fs-18">Uploaded Files</h5>
                            <div class="eachfile p-15">
                                <p class="fs-16">Final_Project_Research.pdf</p>
                                <p class="fs-16">Final_Project_Research.pdf</p>
                                <p class="fs-16">Final_Project_Research.pdf</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="upload-file p-20 m-10">
                            <h5 class="fw-bold fs-18">File Upload</h5>
                            <div class="">
                                <form id="submitfinalproject">
                                    <div class="file-drop-area" id="file-drop-area">
                                        <p>Drag & drop your files here or click to upload</p>
                                        <input type="file" id="final-project-file" name="finalProjectFile"
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

                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="p-20 m-10">
                            <h2 class="final-result text-success fw-bold text-center">
                                98%
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
