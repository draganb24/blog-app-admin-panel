@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-3">Ime: {{ $category->name }}</p>
                        <p class="text-muted mb-3">Kreirana: {{ $category->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
