@extends('dashboard.layouts.master')
@section('title', 'الخزن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'الخزن',
        'PreviousPage' => 'لوحة التحكم',
        'UrlPreviousPage' => 'index',
        'currentPage' => 'الخزن',
    ])

    @include('dashboard.layouts.message')


    <div class="row">
        <div class="col-12 mt-4">
            <div class="table-responsive bg-white shadow rounded">
                <table class="table mb-0 table-center">
                    <thead class="bg-secondary text-white rounded-top">
                        <tr>
                            <th class="border-bottom py-3" style="min-width:20px ">#</th>
                            <th>أسم الخزنة</th>
                            <th>هل رئيسية</th>
                            <th>حالة التفعيل</th>
                            <th>آخر إيصال صرف</th>
                            <th>آخر إيصال تحصيل</th>
                            <th>انشاء بواسطة</th>
                            <th>تحديث بواسطة</th>
                            <th>الأجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $info)
                            <tr class="shop-list">
                                <th class="py-3">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="javascript:void(0)" class="text-dark">{{ $info->name }}</a>
                                </td>
                                <td>
                                    @if ($info->is_master->value == 1)
                                        <span>{{ $info->is_master->label() }}</span>
                                    @else
                                        <span>{{ $info->is_master->label() }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($info->active->value == 1)
                                        <span
                                            class="badge badge-link rounded-pill bg-primary">{{ $info->active->label() }}</span>
                                    @else
                                        <span
                                            class="badge badge-link rounded-pill bg-danger">{{ $info->active->label() }}</span>
                                    @endif
                                </td>
                                <td>{{ $info->last_payment_receipt }}</td>
                                <td>{{ $info->last_collection_receipt }}</td>
                                <td>{{ $info->createdBy->name }}</td>
                                <td>
                                    @if ($info->updated_by > 0)
                                        {{ $info->updatedBy->name }}
                                    @else
                                        لا يوجد تحديث
                                    @endif

                                </td>
                                <td>
                                    <div class="btn-group dropdown-primary">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            الأجراءات
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="javascript:void(0)" class="dropdown-item">تعديل</a>
                                            <a href="javascript:void(0)" class="dropdown-item">عرض</a>
                                            <a href="javascript:void(0)" class="dropdown-item">حذف</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="d-block">
                                <div class="alert alert-primary alert-pills" role="alert">
                                    <span class="badge rounded-pill bg-info me-1">ملحوظة</span>
                                    <span class="content"> عفوآ لا توجد بيانات لعرضها! <i
                                            class="uil uil-angle-right-b"></i></span>
                                </div>
                            </div>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div><!--end col-->
    </div>




@endsection
