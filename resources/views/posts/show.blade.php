@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @php
                        if ($post->image) {
                            $imagePath = asset('storage/' . $post->image->image_path);
                            $imageUrl = $imagePath;
                        } else {
                            $imageUrl = asset('https://placehold.co/600x400');
                        }
                    @endphp
                    <img src="{{ $imageUrl }}" alt="Image" class="avatar me-2" style="max-width: 50px;">
                    <div class="card-header"
                        style="background-image: url('{{ $imageUrl }}'); height: 300px; background-size: cover; background-position: center;">
                        <h1 class="text-center text-white py-5">{{ $post->title }}</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Autor: {{ $post->author }}</p>
                        <p class="text-muted mb-3">Kreirano: {{ $post->created_at }}</p>
                        <p>{!! $post->content !!}</p>
                        @php
                            $postDocuments = DB::table('post_document')
                                ->where('post_id', $post->id)
                                ->select('post_document.document_id')
                                ->get();
                        @endphp

                        @if ($postDocuments->isNotEmpty())
                        <h2>Dokumenti uz objavu</h2>
                            <ul>
                                @foreach ($postDocuments as $document)
                                    <li>{{ $document->document_id }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
