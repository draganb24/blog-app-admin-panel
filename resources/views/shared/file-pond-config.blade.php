<script>
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
</script>
