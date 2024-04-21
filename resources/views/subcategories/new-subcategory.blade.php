@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodajte potkategoriju</div>

                    <div class="card-body">
                        <form method="POST" action="route('subcategories.store')">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Naziv</label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Naziv potkategorije">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategorije kojim pripada:</label>
                                <div>
                                    @php
                                        use App\Models\Category;
                                        $allCategories = Category::all();
                                    @endphp
                                    @foreach ($allCategories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categories[]" id="category{{ $category->id }}" value="{{ $category->id }}">
                                            <label class="form-check-label" for="category{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Nazad</a>
                                <button type="submit" class="btn btn-primary">Sačuvajte izmjene</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
