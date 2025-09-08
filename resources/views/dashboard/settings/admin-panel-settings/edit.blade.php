@php
    use App\Enums\StatusActiveEnum;

@endphp
@extends('dashboard.layouts.master')
@section('title', 'تعديل إعدادت الشركة')
@section('content')

    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'تعديل إعدادت الشركة',
        'PreviousPage' => ' إعدادت الشركة',
        'UrlPreviousPage' => 'admin-panel-settings.index',
        'currentPage' => 'تعديل إعدادت الشركة',
    ])


    <div class="row">
        <!-- Modal Start -->
        <div class="col-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0">جدول الضبط العام للشركة</h5>
                </div>

                @if ($adminPanelSetting->getFirstMediaUrl('logo', 'preview'))
                    <div class="card-body p-2">
                        <img src="{{ $adminPanelSetting->getFirstMediaUrl('logo', 'preview') }}" class="img-fluid rounded"
                            alt="work-image">
                    </div>
                @else
                    <div class="card-body p-2">
                        <img src="{{ asset('dashboard') }}/assets/images/crypto/blocknet.png" class="img-fluid rounded"
                            alt="work-image">
                    </div>
                @endif


                <div class="p-4">
                    <form action="{{ route('dashboard.admin-panel-settings.update', $adminPanelSetting->slug) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="list-group mb-3 border">
                            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                                <div>
                                    <h6 class="my-0">أسم الشركة</h6>
                                    <small class="text-muted"></small>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <input name="company_name" value="{{ $adminPanelSetting->company_name }}"
                                            id="company_name" type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            placeholder="أسم الشركة">
                                        @error('company_name')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </li>
                            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                                <div>
                                    <h6 class="my-0">التليفون</h6>
                                    <small class="text-muted"></small>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <input name="phone" value="{{ $adminPanelSetting->phone }}" id="phone"
                                            type="text" class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="رقم التليفون">
                                        @error('phone')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </li>
                            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                                <div>
                                    <h6 class="my-0">البريد الالكترونى</h6>
                                    <small class="text-muted"></small>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <input name="email" value="{{ old('email', $adminPanelSetting->email) }}"
                                            id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="البريد الالكترونى">
                                        @error('email')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                                <div>
                                    <h6 class="my-0">العنوان</h6>
                                    <small class="text-muted"></small>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <input name="address" value="{{ $adminPanelSetting->address }}" id="address"
                                            type="text" class="form-control @error('address') is-invalid @enderror"
                                            placeholder="العنوان">
                                        @error('address')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>


                            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                                <div>
                                    <h6 class="my-0">الحالة</h6>
                                    <small class="text-muted"></small>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">

                                        <select name="active"
                                            class="form-select form-control @error('active') is-invalid @enderror"
                                            aria-label="Default select example">
                                            <option selected value="">-- أختر الحالة--</option>
                                            <option @if (old('active', $adminPanelSetting->active) == StatusActiveEnum::Active) selected @endif
                                                value="{{ StatusActiveEnum::Active }}">
                                                {{ StatusActiveEnum::Active->label() }}</option>
                                            <option @if (old('active', $adminPanelSetting->active) == StatusActiveEnum::Inactive) selected @endif
                                                value="{{ StatusActiveEnum::Inactive }}">
                                                {{ StatusActiveEnum::Inactive->label() }}</option>
                                        </select>
                                        @error('active')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between lh-sm p-3 border-bottom">

                                <div class="col-md-10  mx-auto mt-2">

                                    <x-image-preview name='logo' />
                                </div>
                            </li>


                            <li class="row my-2 mx-auto">
                                <button type="submit" class="btn btn-primary"> <i
                                        class="fa-solid fa-pen-to-square me-2"></i>تعديل</button>

                            </li>
                        </ul>
                    </form>


                </div>

            </div>
        </div><!--end col-->
        <!-- Modal End -->
    </div>





@endsection
