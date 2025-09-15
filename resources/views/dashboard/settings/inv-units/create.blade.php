@php
    use App\Enums\UnitIsMaster;
@endphp
@extends('dashboard.layouts.master')
@section('active-invUnits', 'active')
@section('title', 'الوحدات')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'الوحدات',
        'PreviousPage' => 'جدول الوحدات',
        'UrlPreviousPage' => 'invUnits.index',
        'currentPage' => 'الوحدات',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> أضافة خزنة جديدة </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.invUnits.store') }}" method="POST" id="storeForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">أسم الوحداته<span class="text-danger mx-1">*</span></label>
                                <input name="name" value="{{ old('name') }}" id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="أسم الوحداته :">
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
                                    <option @if (old('is_master') == UnitIsMaster::Master) selected @endif
                                        value="{{ UnitIsMaster::Master }}">
                                        {{ UnitIsMaster::Master->label() }}</option>
                                    <option @if (old('is_master') == UnitIsMaster::Fragmentation) selected @endif
                                        value="{{ UnitIsMaster::Fragmentation }}">
                                        {{ UnitIsMaster::Fragmentation->label() }}</option>
                                </select>
                                @error('is_master')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
