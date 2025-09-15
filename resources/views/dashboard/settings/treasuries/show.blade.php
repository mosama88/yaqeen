@php
    use App\Enums\Treasury\TreasuryIsMaster;
    use App\Enums\StatusActiveEnum;
@endphp
@extends('dashboard.layouts.master')
@section('active-treasuries', 'active')
@section('title', 'عرض الخزن')
@section('content')
    @include('dashboard.layouts.breadcrumb', [
        'titlePage' => 'عرض الخزن',
        'PreviousPage' => 'جدول الخزن',
        'UrlPreviousPage' => 'treasuries.index',
        'currentPage' => 'عرض الخزن',
    ])

    @include('dashboard.layouts.message')



    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card rounded shadow">
                <div class="p-4 border-bottom">
                    <h5 class="title mb-0"> عرض الخزنة </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive bg-white rounded shadow">
                            <table class="table table-center table-padding mb-0">
                                <tbody>
                                    <tr>
                                        <td class="h6 ps-4 py-3 bg-light">أسم الخزنه</td>
                                        <td class="text-start fw-bold pe-4">{{ $treasury->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h6 ps-4 py-3 bg-light">هل رئيسية</td>
                                        <td class="text-start fw-bold pe-4">{{ $treasury->is_master->label() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h6 ps-4 py-3 bg-light">آخر رقم إيصال صرف نقدية لهذه الخزينه</td>
                                        <td class="text-start fw-bold pe-4">{{ $treasury->last_payment_receipt }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h6 ps-4 py-3 bg-light">آخر رقم إيصال تحصيل نقدية لهذه الخزينه</td>
                                        <td class="text-start fw-bold pe-4">{{ $treasury->last_collection_receipt }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h6 ps-4 py-3 bg-light">الحالة</td>
                                        <td class="text-start fw-bold pe-4">{{ $treasury->active->label() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h5 mb-0">الخزن الفرعية التى سوف تسلم عهدتها الى الخزنه <strong
                                    class="text-primary">الرئيسية</strong>
                                <div class="accordion" id="buyingquestion">
                                    <div class="accordion-item rounded mt-2">
                                        <h2 class="accordion-header" id="headingTwo">

                                            <button class="accordion-button border-0 bg-success text-light collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="fa-solid fa-plus me-2"></i>
                                                أضافة جديد
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse border-0 collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#buyingquestion">
                                            <div class="accordion-body text-muted">
                                                <form
                                                    action="{{ route('dashboard.treasury_deliveries.store', $treasury->id) }}"
                                                    method="POST" id="storeForm">
                                                    @csrf
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">أختر الخزنه الفرعية<span
                                                                class="text-danger">*</span></label>
                                                        <select name="treasuries_can_delivery"
                                                            class="form-select form-control @error('treasuries_can_delivery') is-invalid @enderror"
                                                            aria-label="Default select example">
                                                            <option selected value="">-- أختر الخزنه --</option>
                                                            @forelse ($treasuries as $treasury)
                                                                <option value="{{ $treasury->id }}">{{ $treasury->name }}
                                                                </option>
                                                            @empty
                                                                لا توجد بيانات لعرضها
                                                            @endforelse
                                                        </select>
                                                        @error('treasuries_can_delivery')
                                                            <span class="invalid-feedback d-block text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <button class="btn btn-primary btn-sm" id="submitButton" type="submit">
                                                        <i class="fa-solid fa-plus me-2"></i>
                                                        أضـف
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>

                            <span class="badge bg-primary rounded-pill">{{ $treasury_deliveries->total() }} خزنه</span>
                        </div>
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead class="bg-light rounded-top">
                                    <tr>
                                        <th class="border-bottom py-3" style="min-width:20px ">#</th>
                                        <th>أسم الخزنة</th>
                                        <th>انشاء بواسطة</th>
                                        <th>الأجراءات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($treasury_deliveries as $info)
                                        <tr class="shop-list">
                                            <th class="py-3">{{ $loop->iteration }}</th>
                                            <td>
                                                <a href="javascript:void(0)"
                                                    class="text-dark">{{ $info->treasuriesCanDelivery->name }}</a>
                                            </td>
                                            <td>{{ $info->createdBy->name }} ( {{ $info->created_at }} )</td>
                                            <td title="حذف">
                                                <form id="delete-form-{{ $info->id }}"
                                                    action="{{ route('dashboard.treasury_deliveries.destroy', $info->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="javascript:void(0)" id="delete_one" data-id="{{ $info->id }}"
                                                    class=" delete-btn text-danger"><i class="uil uil-times"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="my-4 d-block p-3 mx-auto">
                                            <div class="alert alert-primary alert-pills" role="alert">
                                                <span class="badge rounded-pill bg-info me-1">ملحوظة</span>
                                                <span class="content"> !عفوآ لا توجد بيانات لعرضها </span>
                                            </div>
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>

                            <div class="row">
                                {{ $treasury_deliveries->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <script src="{{ asset('dashboard') }}/assets/js/sweetalert2@11.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attach event listener to delete buttons
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior

                    // Retrieve the form ID from the button's data attribute
                    const nameId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${nameId}`);

                    // Display SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'هل أنت متأكد؟',
                        text: 'لن تتمكن من التراجع عن هذا!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'نعم، احذفه!',
                        cancelButtonText: 'إلغاء'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request
                            fetch(form.action, {
                                    method: 'POST',
                                    body: new FormData(form),
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Add CSRF token
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: "تم الحذف",
                                            text: data
                                                .message, // هذه الرسالة تأتي من الـ Controller
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        }).then(() => {
                                            location
                                                .reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "خطأ!",
                                            text: data.message ||
                                                "حدث خطأ غير متوقع",
                                            icon: 'error'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: "خطأ!",
                                        text: "حدث خطأ غير متوقع",
                                        icon: 'error'
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>

    <script>
        // حل بديل أكثر موثوقية
        function disableButton() {
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ';

            // إرسال النموذج تلقائيًا بعد تعطيل الزر
            document.getElementById('storeForm').submit();
        }

        // أو يمكنك استخدام هذا الحدث
        document.getElementById('storeForm').addEventListener('submit', function() {
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ';
        });
    </script>
@endpush
