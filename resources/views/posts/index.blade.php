@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header d-print-none">
            <div class="container-xl">
                @include('shared.success-message')
                @include('shared.confirm-delete')
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Objave
                        </h2>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('post.new') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
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
                        <thead style="background-color:beige;">
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
                                            @if ($post->image)
                                                <img src="{{ asset('storage/' . $post->image->thumbnail_path) }}"
                                                    alt="Thumbnail" class="avatar me-2" style="max-width: 50px;">
                                            @else
                                                <img src="{{ asset('https://placehold.co/170x80') }}" alt="Placeholder"
                                                    class="avatar me-2" style="max-width: 50px;">
                                            @endif
                                            <div class="flex-fill">
                                                <div class="font-weight-medium">{{ $post->title }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Title">
                                        <div>{!! strlen($post->content) > 50 ? substr($post->content, 0, 50) . '...' : $post->content !!}</div>
                                    </td>
                                    <td class="text-secondary" data-label="Role">
                                        {{ $post->author }}
                                    </td>
                                    <td class="text-secondary" data-label="Role">
                                        {{ substr($post->date_of_publishment, 0, 10) }}
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('post.show', $post->slug) }}" class="btn btn-secondary">
                                                Prikažite
                                            </a>
                                            <a href="{{ route('post.edit.form', $post->slug) }}" class="btn btn-primary">
                                                Izmjenite
                                            </a>
                                            <form method="POST" action="{{ route('post.delete', $post->slug) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="showConfirmDeleteModal('{{ route('post.delete', $post->slug) }}')">
                                                    Obrišite
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
