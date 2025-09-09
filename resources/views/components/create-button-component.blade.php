<div class="card-footer text-center">
    <button type="submit" id="submitButton" class="btn btn-md btn-primary"> <i class="far fa-save mx-1"></i> حفظ
        البيانات</button>
</div>


@push('js')
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
