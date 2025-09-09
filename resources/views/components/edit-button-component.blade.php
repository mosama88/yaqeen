<div class="card-footer text-center">
    <button type="submit" id="submitButton" class="btn btn-md btn-info text-white"> <i class="fas fa-marker mx-1"></i>
        تعديل البيانات</button>
</div>

@push('js')
    <script>
        // حل بديل أكثر موثوقية
        function disableButton() {
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التعديل';

            // إرسال النموذج تلقائيًا بعد تعطيل الزر
            document.getElementById('updateForm').submit();
        }

        // أو يمكنك استخدام هذا الحدث
        document.getElementById('updateForm').addEventListener('submit', function() {
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التعديل';
        });
    </script>
@endpush
