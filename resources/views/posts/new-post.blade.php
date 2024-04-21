@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <style>
        .page-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .modal-body {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-xl">
        <h2 class="page-title">Kreirajte novu objavu</h2>
        <form method="POST" action="http://localhost:8000/api/objave">
            @csrf
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Naslov</label>
                            <input type="text" class="form-control" name="title" placeholder="Naslov objave">
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label">Fotografija</label>
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Kategorija</label>
                                    <select class="form-select" name="category">
                                        <option value="1" selected>Private</option>
                                        <option value="2">Public</option>
                                        <option value="3">Hidden</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Datum objave</label>
                                <input type="date" class="form-control" name="date_of_publishment">
                              </div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Sadržaj</label>
                                    <textarea class="form-control" rows="3" name="content"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('posts.index') }}" class="btn btn-link link-secondary">
                            Nazad
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                            Kreirajte objavu
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
@section('scripts')
<script>
    const inputElement = document.querySelector('input[id="image"]');
    const pond = FilePond.create( inputElement );
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
