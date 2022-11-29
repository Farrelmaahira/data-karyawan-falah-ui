@extends('admin.layouts.main')
@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Edit') }}</div>

                        <div class="card-body ml-auto">
                            <form method="POST" action="{{ route('admin.update', auth()->user()->id) }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" aria-label="First name" class="form-control"
                                                name="first" value="{{ $user->first }}">
                                            <input type="text" aria-label="Last name" class="form-control" name="last"
                                                value="{{ $user->last }}">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ $user->username }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="form-select"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Section') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Default select example" name="section"
                                            id="form-select">
                                            <option value="{{ $user->sections->id }}">{{ $user->sections->name }}</option>
                                            @foreach ($section as $item)
                                                <option value={{ $item->id }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="form-select"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Profile Picture') }}</label>

                                    <div class="col-md-6">
                                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="form-select" class="col-md-4 col-form-label text-md-end"></label>

                                    <div class="col-md-6">
                                        <img src="/storage/img/{{ $user->image }}" height="100">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Edit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
