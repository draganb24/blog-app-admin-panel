@extends('layouts.app')
@section('content')
    <!doctype html>
    <html lang="en">
    <div class="d-flex flex-column">
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">Ulogujte se</h2>
                        <form id="loginForm" action="{{ route('login') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email adresa</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    placeholder="your@email.com" autocomplete="off">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Lozinka</label>
                                <div class="input-group input-group-flat">
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Your password" autocomplete="off">
                                    <span class="input-group-text">
                                        <a href="#" class="link-secondary" title="Show password"
                                            data-bs-toggle="tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path
                                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                </path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary w-100">Ulogujte se</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </html>
@endsection
