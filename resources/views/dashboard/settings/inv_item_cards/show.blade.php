@php
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('active-invItemCategory', 'active')
@section('title', 'عرض فئة الصنف')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'عرض فئة الصنف',
        'PreviousPage' => 'جدول فئة الصنف',
        'UrlPreviousPage' => 'invItemCategory.index',
        'currentPage' => 'عرض فئة الصنف',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> عرض فئة الصنف </h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">أسم فئة الصنف<span class="text-danger mx-1">*</span></label>
                            <input name="name" id="name" type="text"
                                value="{{ old('name', $invItemCategory->name) }}" class="form-control"
                                placeholder="أسم فئة الصنف :">
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label">الحالة <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text"
                                value="{{ old('name', $invItemCategory->active->label()) }}" class="form-control"
                                placeholder="أسم فئة الصنف :">
                        </div>
                    </div><!--end row-->

                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
@endpush
