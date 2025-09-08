@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/toastr.min.css">
@endpush
@push('js')
    <script src="{{ asset('dashboard') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right", // 👈 هنا التغيير
                "timeOut": "5000"
            };

            @if ($errors->has('error'))
                toastr.error('{{ $errors->first('error') }}');
            @endif

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif

            @if (session('error'))
                toastr.error('{{ session('error') }}');
            @endif
        });
    </script>
@endpush
