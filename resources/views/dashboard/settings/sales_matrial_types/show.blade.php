@php
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'عرض فئة الفاتورة')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'عرض فئة الفاتورة',
        'PreviousPage' => 'جدول فئة الفاتورة',
        'UrlPreviousPage' => 'sales_matrial_types.index',
        'currentPage' => 'عرض فئة الفاتورة',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> عرض فئة الفاتورةة </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">أسم فئة الفاتورةه<span class="text-danger mx-1">*</span></label>
                            <input name="name" id="name" type="text"
                                value="{{ old('name', $salesMatrialType->name) }}" class="form-control bg-light" readonly
                                placeholder="أسم فئة الفاتورة :">
                        </div><!--end col-->
                    </div><!--end row-->

                </div>
            </div>
        </div>
    </div>


@endsection
