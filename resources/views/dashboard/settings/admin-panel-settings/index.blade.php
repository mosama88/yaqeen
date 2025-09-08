@extends('dashboard.layouts.master')
@section('title', 'إعدادت الشركة')
@section('content')

    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'إعدادت الشركة',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'إعدادت الشركة',
    ])


    <div class="row">
        <!-- Modal Start -->
        <div class="col-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0">جدول الضبط العام للشركة</h5>
                </div>

                <div class="p-4">
                    <ul class="list-group mb-3 border">
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">أسم الشركة</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">{{ $adminPanelSetting->company_name }}</span>
                        </li>
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">التليفون</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">{{ $adminPanelSetting->phone }}</span>
                        </li>
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">البريد الالكترونى</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">{{ $adminPanelSetting->email }}</span>
                        </li>
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">العنوان</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">{{ $adminPanelSetting->address }}</span>
                        </li>
                        <li class="d-flex justify-content-between lh-sm p-3 border-bottom">
                            <div>
                                <h6 class="my-0">الحالة</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">
                                @if ($adminPanelSetting->active->value == 1)
                                    <span
                                        class="badge badge-link rounded-pill bg-primary">{{ $adminPanelSetting->active->label() }}</span>
                                @else
                                    <span
                                        class="badge badge-link rounded-pill bg-danger">{{ $adminPanelSetting->active->label() }}</span>
                                @endif
                            </span>
                        </li>
                        <li class="row my-2 mx-auto">
                            <a href="{{ route('dashboard.admin-panel-settings.edit', $adminPanelSetting->slug) }}"
                                class="w-100 btn btn-info" type="submit"><i class="fa-solid fa-pen-to-square me-2"></i>
                                تعديل </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div><!--end col-->
        <!-- Modal End -->
    </div>






@endsection
