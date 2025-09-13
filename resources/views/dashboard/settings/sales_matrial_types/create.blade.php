@php
    use App\Enums\Treasury\TreasuryIsMaster;
@endphp
@extends('dashboard.layouts.master')
@section('title', 'فئات الفواتير')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'فئات الفواتير',
        'PreviousPage' => 'جدول فئات الفواتير',
        'UrlPreviousPage' => 'treasuries.index',
        'currentPage' => 'فئات الفواتير',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> أضافة فئة جديدة </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.salesMatrialType.store') }}" method="POST" id="storeForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">أسم فئات الفواتيره<span class="text-danger mx-1">*</span></label>
                                <input name="name" value="{{ old('name') }}" id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="أسم فئات الفواتير :">
                                @error('name')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end col-->
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
