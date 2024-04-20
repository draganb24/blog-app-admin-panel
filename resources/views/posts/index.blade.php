@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Objave
                    </h2>
                </div>
                <div class="col text-end">
                    <a href="http://localhost:8000/nova-objava" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        Kreirajte novu objavu
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
                            <th>Naslov</th>
                            <th>Sadržaj</th>
                            <th>Autor</th>
                            <th>Datum objave</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    @php
                                    $imageUrl = App\Models\Image::where('id', $post->image_id)->value('image_path');
                                    @endphp
                                    <span class="avatar me-2" style="background-image: url('{{ $imageUrl }}')"></span>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium"> {{ $post->title }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Title">
                                <div> {{ $post->content }}</div>
                            </td>
                            <td class="text-secondary" data-label="Role">
                                {{ $post->author }}
                            </td>
                            <td class="text-secondary" data-label="Role">
                                {{ $post->date_of_publishment }}
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('post.edit.form', $post->slug) }}" class="btn">
                                        Izmjenite
                                    </a>
                                    <a href="#" class="btn">
                                        Obrišite
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
