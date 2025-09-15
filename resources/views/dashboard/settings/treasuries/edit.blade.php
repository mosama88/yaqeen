@php
    use App\Enums\Treasury\TreasuryIsMaster;
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('active-treasuries', 'active')
@section('title', 'تعديل الخزن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'تعديل الخزن',
        'PreviousPage' => 'جدول الخزن',
        'UrlPreviousPage' => 'treasuries.index',
        'currentPage' => 'تعديل الخزن',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> تعديل الخزنة </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.treasuries.update', $treasury->slug) }}" method="POST" id="updateForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">أسم الخزنه<span class="text-danger mx-1">*</span></label>
                                <input name="name" id="name" type="text"
                                    value="{{ old('name', $treasury->name) }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="أسم الخزنه :">
                                @error('name')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end col-->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">هل رئيسية <span class="text-danger">*</span></label>
                                <select name="is_master"
                                    class="form-select form-control @error('is_master') is-invalid @enderror"
                                    aria-label="Default select example">
                                    <option selected value="">-- أختر النوع--</option>
                                    <option @if (old('is_master', $treasury->is_master) == TreasuryIsMaster::Master) selected @endif
                                        value="{{ TreasuryIsMaster::Master }}">
                                        {{ TreasuryIsMaster::Master->label() }}</option>
                                    <option @if (old('is_master', $treasury->is_master) == TreasuryIsMaster::SubBranch) selected @endif
                                        value="{{ TreasuryIsMaster::SubBranch }}">
                                        {{ TreasuryIsMaster::SubBranch->label() }}</option>
                                </select>
                                @error('is_master')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">آخر رقم إيصال صرف نقدية لهذه الخزينه</label>
                                <input name="last_payment_receipt" id="last_payment_receipt"
                                    value="{{ old('last_payment_receipt', $treasury->last_payment_receipt) }}"
                                    class="form-control @error('last_payment_receipt') is-invalid @enderror"
                                    placeholder="إدخل رقم الايصال :"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                                @error('last_payment_receipt')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">آخر رقم إيصال تحصيل نقدية لهذه الخزينه</label>
                                <input name="last_collection_receipt" id="last_collection_receipt"
                                    value="{{ old('last_collection_receipt', $treasury->last_collection_receipt) }}"
                                    class="form-control @error('last_collection_receipt') is-invalid @enderror"
                                    placeholder="إدخل رقم الايصال :"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                                @error('last_collection_receipt')
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
                                    <option @if (old('active', $treasury->active) == StatusActiveEnum::Active) selected @endif
                                        value="{{ StatusActiveEnum::Active }}">
                                        {{ StatusActiveEnum::Active->label() }}</option>
                                    <option @if (old('active', $treasury->active) == StatusActiveEnum::Inactive) selected @endif
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
