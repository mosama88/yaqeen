
@extends('dashboard.layouts.master')
@section('title', 'المخازن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'المخازن',
        'PreviousPage' => 'جدول المخازن',
        'UrlPreviousPage' => 'stores.index',
        'currentPage' => 'المخازن',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> أضافة خزنة جديدة </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.stores.store') }}" method="POST" id="storeForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">أسم المخزن<span class="text-danger mx-1">*</span></label>
                                <input name="name" value="{{ old('name') }}" id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="أسم المخزن :">
                                @error('name')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--end col-->

                            <!--end col-->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">تليفون المخزن</label>
                                <input name="phone" value="{{ old('phone') }}" id="phone"
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
                                <input name="address" value="{{ old('address') }}" id="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="عنوان المخزن :">
                                @error('address')
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
