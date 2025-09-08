<div class="box box-primary col-md-12">
    <div class="box-body">
        <input type="file" class="mx-auto" id="imageInput" name="{{ $name }}" />

        <img id="imagePreview" style="max-width: 400px; display: none;" />

    </div>
</div>
@push('css')
    <link href="{{ asset('dashboard') }}/assets/css/filepond.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/assets/css/filepond-plugin-image-preview.css" type="text/css" rel="stylesheet">
@endpush
@push('js')
    <script src="{{ asset('dashboard') }}/assets/js/filepond.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/filepond-plugin-image-preview.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/filepond-plugin-file-validate-type.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const pond = FilePond.create(document.querySelector('#imageInput'), {
                allowImagePreview: true,
                imagePreviewMaxHeight: 200,
                storeAsFile: true,
                allowMultiple: true,
                acceptedFileTypes: ['image/*'],
            });

            @if ($value)
                pond.addFile("{{ $value }}");
            @endif
        });
    </script>
@endpush
