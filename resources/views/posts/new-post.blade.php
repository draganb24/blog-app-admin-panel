@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <h2 class="page-title">Kreirajte novu objavu</h2><br>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label class="form-label">Naslov</label>
                        <input type="text" class="form-control" name="title" placeholder="Naslov objave">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Naslovna fotografija</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Galerija slika</label>
                        <input type="file" class="form-control" name="images[]" id="images" multiple>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dokumenti</label>
                        <input type="file" class="form-control" name="documents[]" id="documents" multiple>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="form-label">Kategorije:</label>
                        <div>
                            @php
                                use App\Models\Category;
                                $allCategories = Category::all();
                            @endphp
                            @foreach ($allCategories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]"
                                        id="category{{ $category->id }}" value="{{ $category->id }}">
                                    <label class="form-check-label"
                                        for="category{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Datum objave</label>
                        <input type="date" class="form-control" name="date_of_publishment">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Sadržaj</label>
                <textarea class="form-control tinymce" rows="3" name="content"></textarea>
            </div>
            <div class="text-end">
                <a href="{{ route('posts.index') }}" class="btn btn-link link-secondary">
                    Nazad
                </a>
                <button type="submit" class="btn btn-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Kreirajte objavu
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    @include('shared.tinymce-config')
    @include('shared.file-pond-config')
@endsection
