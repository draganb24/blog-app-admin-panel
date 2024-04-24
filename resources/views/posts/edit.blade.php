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
                            @foreach ($allCategories as $category)
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="categories[]"
                                        value="{{ $category->id }}"
                                        {{ $post->categories->contains($category->id) ? 'checked' : '' }}>
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
    @include('shared.tinymce-config')
    @include('shared.file-pond-config')
@endsection
