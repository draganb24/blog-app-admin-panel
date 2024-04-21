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

            .form-check-inline {
                margin-right: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Dodajte potkategoriju
                        </h2>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <form method="POST" action="http://localhost:8000/api/potkategorije">
                    @csrf
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Naziv</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Naziv potkategorije">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Kategorije</div>
                                    <div>
                                        @php
                                            use App\Models\Category;
                                            $allCategories = Category::all();
                                        @endphp
                                        @foreach ($allCategories as $category)
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="categories[]"
                                                    value="{{ $category->id }}">
                                                <span class="form-check-label">{{ $category->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('categories.index') }}" class="btn">
                                    Nazad
                                </a>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Sačuvajte izmjene
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>
@endsection
