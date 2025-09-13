@php
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'تعديل بيانات المخزن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'تعديل بيانات المخزن',
        'PreviousPage' => 'جدول بيانات المخزن',
        'UrlPreviousPage' => 'stores.index',
        'currentPage' => 'تعديل بيانات المخزن',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> تعديل بيانات المخزنة </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.stores.update', $store->slug) }}" method="POST" id="updateForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">أسم بيانات المخزنه<span class="text-danger mx-1">*</span></label>
                                <input name="name" id="name" type="text" value="{{ old('name', $store->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="أسم بيانات المخزنه :">
                                @error('name')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end col-->

                            <div class="col-md-6 mb-3">
                                <label class="form-label">تليفون المخزن</label>
                                <input name="phone" value="{{ old('phone', $store->phone) }}" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="تليفون المخزن :"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                                @error('phone')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">عنوان المخزن</label>
                                <input name="address" value="{{ old('address', $store->address) }}" id="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="عنوان المخزن :">
                                @error('address')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">الحالة <span class="text-danger">*</span></label>
                                <select name="active"
                                    class="form-select form-control @error('active') is-invalid @enderror"
                                    aria-label="Default select example">
                                    <option selected value="">-- أختر الحالة--</option>
                                    <option @if (old('active', $store->active) == StatusActiveEnum::Active) selected @endif
                                        value="{{ StatusActiveEnum::Active }}">
                                        {{ StatusActiveEnum::Active->label() }}</option>
                                    <option @if (old('active', $store->active) == StatusActiveEnum::Inactive) selected @endif
                                        value="{{ StatusActiveEnum::Inactive }}">
                                        {{ StatusActiveEnum::Inactive->label() }}</option>
                                </select>
                                @error('active')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
