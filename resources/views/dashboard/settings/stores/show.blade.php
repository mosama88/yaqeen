@php
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('active-stores', 'active')
@section('title', 'عرض بيانات المخزن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'عرض بيانات المخزن',
        'PreviousPage' => 'جدول بيانات المخزن',
        'UrlPreviousPage' => 'stores.index',
        'currentPage' => 'عرض بيانات المخزن',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> عرض بيانات المخزن </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">أسم بيانات المخزنه<span class="text-danger mx-1">*</span></label>
                            <input readonly name="name" id="name" type="text"
                                value="{{ old('name', $store->name) }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="أسم بيانات المخزنه :">
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label">تليفون المخزن</label>
                            <input readonly name="phone" value="{{ old('phone', $store->phone) }}" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="تليفون المخزن :"
                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">عنوان المخزن</label>
                            <input readonly name="address" value="{{ old('address', $store->address) }}" id="address"
                                class="form-control @error('address') is-invalid @enderror" placeholder="عنوان المخزن :">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">الحالة <span class="text-danger">*</span></label>
                            <input readonly name="active" value="{{ old('active', $store->active->label()) }}"
                                id="active" class="form-control @error('active') is-invalid @enderror"
                                placeholder="تليفون المخزن :" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                        </div>
                    </div><!--end row-->

                </div>
            </div>
        </div>
    </div>


@endsection
