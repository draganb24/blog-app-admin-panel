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
                    @php
                        $titleImage = DB::table('images')
                            ->where('id', $post->image_id)
                            ->first();
                    @endphp
                    <div class="mb-3">
                        <label class="form-label">Naslovna fotografija</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <div>
                            @if ($titleImage)
                                <div class="image-item d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <img src="{{ asset('storage/' . $titleImage->image_path) }}" alt="Title Image"
                                            class="img-fluid" width="50" height="50">
                                        <span>{{ $titleImage->image_caption }}</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash cursor-pointer delete-title-image">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    @php
                        $galleryImages = DB::table('images')
                            ->where('post_id', $post->id)
                            ->select('id', 'image_caption', 'image_path')
                            ->get();
                    @endphp
                    <div class="mb-3">
                        <label class="form-label">Galerija slika</label>
                        <input type="file" class="form-control" name="images[]" id="images" multiple>
                        <div id="images-container">
                            @if ($galleryImages->isNotEmpty())
                                @foreach ($galleryImages as $image)
                                    <div class="image-item d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image"
                                                class="img-fluid" width="50" height="50">
                                            <span>{{ $image->image_caption }}</span>
                                        </div>
                                        <svg id="deleteImage{{ $image->id }}" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash cursor-pointer delete-image">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    @php
                        $documents = DB::table('documents')
                            ->where('post_id', $post->id)
                            ->select('id', 'document_title')
                            ->get();
                    @endphp
                    <div class="mb-3">
                        <label class="form-label">Dokumenti</label>
                        <input type="file" class="form-control" name="documents[]" id="documents" multiple>
                        <div id="documents-container">
                            @if ($documents->isNotEmpty())
                                @foreach ($documents as $document)
                                    <div class="document-item d-flex justify-content-between align-items-center mb-2">
                                        <span class="flex-grow-1">{{ $document->document_title }}</span>
                                        <svg id="deleteDocument{{ $document->id }}" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash cursor-pointer delete-document">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </div>
                                @endforeach
                            @endif
                        </div>
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
    <script>
        document.querySelectorAll('.delete-document').forEach(item => {
            item.addEventListener('click', event => {
                const documentId = item.id.replace('deleteDocument', '');
                fetch(`/api/dokumenti/${documentId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            post_id: 0
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            item.closest('.document-item').remove();
                        } else {
                            console.error('Failed to update post_id');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
    <script>
        document.querySelectorAll('.delete-image').forEach(item => {
            item.addEventListener('click', event => {
                const imageId = item.id.replace('deleteImage', '');
                fetch(`/api/fotografije/${imageId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            post_id: 0
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            item.closest('.image-item').remove();
                        } else {
                            console.error('Failed to update post_id');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
    <script>
        const deleteTitleImage = document.querySelector('.delete-title-image');
        if (deleteTitleImage) {
            deleteTitleImage.addEventListener('click', event => {
                const postSlug = window.location.pathname.split('/').pop();
                fetch(`/api/objave/${postSlug}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            image_id: 0
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            deleteTitleImage.closest('.image-item').remove();
                        } else {
                            console.error('Failed to update image_id');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        }
    </script>
@endsection
