@php
    use App\Enums\UnitIsMaster;
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'عرض الوحدات')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'عرض الوحدات',
        'PreviousPage' => 'جدول الوحدات',
        'UrlPreviousPage' => 'invUnits.index',
        'currentPage' => 'عرض الوحدات',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> عرض الوحدات </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">أسم الوحدات<span class="text-danger mx-1">*</span></label>
                            <input readonly name="name" id="name" type="text"
                                value="{{ old('name', $invUnit->name) }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="أسم الوحدات :">
                        </div><!--end col-->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">هل رئيسية <span class="text-danger">*</span></label>
                            <input readonly name="is_master" id="is_master" type="text"
                                value="{{ old('is_master', $invUnit->is_master->label()) }}" class="form-control"
                                placeholder="أسم الوحدات :">
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">الحالة <span class="text-danger">*</span></label>
                            <input readonly name="active" id="active" type="text"
                                value="{{ old('active', $invUnit->active->label()) }}" class="form-control"
                                placeholder="الحالة الوحدات :">

                        </div>
                    </div><!--end row-->

                </div>
            </div>
        </div>
    </div>


@endsection
