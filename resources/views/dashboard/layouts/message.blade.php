@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/toastr.min.css">
@endpush
@push('js')
    <script src="{{ asset('dashboard') }}/assets/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            @if ($errors->has('error'))
                toastr.error('{{ $errors->first('error') }}');
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                var Dynamic = '{{ session('success') }}';
                toastr.success(Dynamic);
            @endif
        });
    </script>
@endpush
