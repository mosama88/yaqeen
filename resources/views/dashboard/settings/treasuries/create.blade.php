@extends('dashboard.layouts.master')
@section('title', 'الخزن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'الخزن',
        'PreviousPage' => 'جدول الخزن',
        'UrlPreviousPage' => 'treasuries.index',
        'currentPage' => 'الخزن',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> أضافة خزنة جديدة </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.treasuries.store') }}" method="POST" id="storeForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">أسم الخزنه<span class="text-danger mx-1">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="name" id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="أسم الخزنه :">
                                        @error('name')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="email" id="email" type="email"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            placeholder="Your email :">
                                        @error('company_name')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <div class="form-icon position-relative">
                                        <input name="subject" id="subject"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            placeholder="Your subject :">
                                        @error('company_name')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Comments</label>
                                    <div class="form-icon position-relative">
                                        <textarea name="comments" id="comments" rows="4" class="form-control @error('company_name') is-invalid @enderror"
                                            placeholder="Your Message :"></textarea>
                                        @error('company_name')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <x-create-button-component></x-create-button-component>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div>
            </div>
        </div>
    </div>


@endsection
