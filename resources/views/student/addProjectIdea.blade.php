@extends('layouts.master-student')
@section('title', 'Add project idea')

@section('content')
    <div class="secdule-meetings student-meetings">
        <div class="container card-authntucation-color mt-20 p-20">
            <div class="row mt-20">
                <div class="container">
                    <div class="col-lg-12">
                        <div class="upload-container d-flex align-items-center justify-content-center flex-column">
                            <button class="btn main-btn mb-3" id="uploadBtn">
                                Add Project Idea
                            </button>

                            <input type="file" id="fileInput" style="display: none"
                                   onchange="handleFileUpload(event)" />

                            <p id="uploadedFileName" class="text-success fw-bold"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
