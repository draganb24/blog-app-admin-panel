@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @php
                        $imageUrl = App\Models\Image::where('id', $post->image_id)->value('image_path');
                    @endphp
                    <div class="card-header" style="background-image: url('{{ $imageUrl }}'); height: 300px; background-size: cover; background-position: center;">
                        <h1 class="text-center text-white py-5">{{ $post->title }}</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Author: {{ $post->author }}</p>
                        <p class="text-muted mb-3">Created At: {{ $post->created_at }}</p>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
