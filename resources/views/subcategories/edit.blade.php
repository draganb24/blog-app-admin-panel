@extends('layouts.app')

@section('content')
    <div class="container-xl">
        @include('shared.success-message')
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Izmjenite potkategoriju
                    </h2>
                </div>
            </div>
        </div>
        <div class="page-body">
            <form method="POST" action="{{ route('subcategory.update', $subcategory->slug) }}">
                @csrf
                @method('PUT')
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Naziv</label>
                                <input type="text" class="form-control" name="name" placeholder="Naziv kategorije"
                                    value="{{ $subcategory->name }}">
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Kategorije</div>
                                <div>
                                    @foreach ($allCategories as $category)
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="categories[]"
                                            value="{{ $category->id }}"
                                            {{ $subcategory->categories->contains($category->id) ? 'checked' : '' }}>
                                        <span class="form-check-label">{{ $category->name }}</span>
                                    </label>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('categories.index') }}" class="btn btn-link">Nazad</a>
                            <button type="submit" class="btn btn-primary">Sačuvajte izmjene</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
