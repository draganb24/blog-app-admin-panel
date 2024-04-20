@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Kategorije
                        </h2>
                    </div>
                    <div class="col text-end">
                        <a href="http://localhost:8000/nova-objava" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Kreirajte novu kategoriju
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Naziv</th>
                                <th>Podkategorije</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td data-label="Name">
                                        {{ $category->name }}
                                    </td>
                                    <td data-label="Subcategories">
                                        <ul>
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>{{ $subcategory->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="#" class="btn">
                                                Izmjeni
                                            </a>
                                            <a href="#" class="btn">
                                                Obriši
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
