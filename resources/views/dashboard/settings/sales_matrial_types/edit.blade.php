@php
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'تعديل فئة الفاتورة')
@section('active-treasuries', 'active')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'تعديل فئة الفاتورة',
        'PreviousPage' => 'جدول فئة الفاتورة',
        'UrlPreviousPage' => 'salesMatrialType.index',
        'currentPage' => 'تعديل فئة الفاتورة',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> تعديل فئة الفاتورةة </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.salesMatrialType.update', $salesMatrialType->slug) }}" method="POST"
                        id="updateForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">أسم فئة الفاتورةه<span class="text-danger mx-1">*</span></label>
                                <input name="name" id="name" type="text"
                                    value="{{ old('name', $salesMatrialType->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="أسم فئة الفاتورة :">
                                @error('name')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end col-->
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <x-edit-button-component></x-edit-button-component>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div>
            </div>
        </div>
    </div>


@endsection
