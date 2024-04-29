<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);

    const inputElement = document.querySelector('input[id="image"]');
    const pond = FilePond.create(inputElement);
    FilePond.setOptions({
        server: {
            url: '/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });

    const inputElementImages = document.querySelector('input[id="images"]');
    const pondImages = FilePond.create(inputElementImages);

    const inputElementDocuments = document.querySelector('input[id="documents"]');
    const pondDocuments = FilePond.create(inputElementDocuments);
</script>

