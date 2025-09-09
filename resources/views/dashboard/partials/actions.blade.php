<div class="btn-group dropdown-primary">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        الأجراءات
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('dashboard.' . $name . '.edit', $name_id) }}" class="dropdown-item">تعديل</a>
        <a href="{{ route('dashboard.' . $name . '.show', $name_id) }}" class="dropdown-item">عرض</a>
        <form id="delete-form-{{ $name_id }}" action="{{ route('dashboard.' . $name . '.destroy', $name_id) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <a href="javascript:void(0)" id="delete_one" data-id="{{ $name_id }}"
            class="dropdown-item delete-btn">حذف</a>
    </div>
</div>








@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@endpush
