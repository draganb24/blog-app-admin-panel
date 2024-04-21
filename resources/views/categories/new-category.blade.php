@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodajte kategoriju</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Naziv</label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Naziv kategorije">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Potkategorije:</label>
                                <div>
                                    @php
                                        use App\Models\Subcategory;
                                        $allSubcategories = Subcategory::all();
                                    @endphp
                                    @foreach ($allSubcategories as $subcategory)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="subcategories[]" id="subcategory{{ $subcategory->id }}" value="{{ $subcategory->id }}">
                                            <label class="form-check-label" for="subcategory{{ $subcategory->id }}">{{ $subcategory->name }}</label>
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
