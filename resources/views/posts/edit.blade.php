@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <h2 class="page-title">Uredite objavu</h2><br>
        <form method="POST" action="{{ route('post.update', $post->slug) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label class="form-label">Naslov</label>
                        <input type="text" class="form-control" name="title" placeholder="Naslov objave"
                            value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Naslovna fotografija</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <div class="form-label">Kategorije</div>
                        <div>
                            @foreach($allCategories as $category)
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" {{ $post->categories->contains($category->id) ? 'checked' : '' }}>
                                <span class="form-check-label">{{ $category->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Datum objave</label>
                        <input type="date" class="form-control" name="date_of_publishment"
                            value="{{ $post->date_of_publishment ?? '' }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Sadržaj</label>
                <textarea class="form-control" rows="3" name="content">{{ $post->content }}</textarea>
            </div>
            <div class="text-end">
                <a href="{{ route('posts.index') }}" class="btn btn-link link-secondary">
                    Nazad
                </a>
                <button type="submit" class="btn btn-primary">
                    Sačuvajte izmjene
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::to('src/js/vendor/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            height: 400,
            license_key: 'gpl'
        });
    </script>
    <script>
        var editor_config = {
            path_absolute: "{{ URL::to('/') }}/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
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
@endsection
