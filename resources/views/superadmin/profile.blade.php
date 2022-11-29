@extends('superadmin.layouts.main')


@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card p-3 py-4">
                        <div class="text-center">
                            <img src="/storage/img/{{ auth()->user()->image }}" width="100" class="rounded-circle">
                        </div>
                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0">
                                {{ auth()->user()->first }} {{ auth()->user()->last }}
                            </h5>
                           @if (auth()->user()->sections_id > 0)
                           <span>{{ auth()->user()->sections->name }}</span>
                           @endif
                            
                            <h5>
                                Email : {{ auth()->user()->email }}
                            </h5>
                            <h5>
                                Gender : {{ auth()->user()->gender }}
                            </h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"  onclick="editData({{ auth()->user()->id }}, `{{ route('superadmin.update', auth()->user()->id) }}`)">
                               Edit
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" id="editForm">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" aria-label="First name" class="form-control" name="first"
                                        placeholder="First Name" autocomplete="first" autofocus id="first">
                                    <input type="text" aria-label="Last name" class="form-control" name="last"
                                        placeholder="Last Name" autocomplete="last" id="last">
                                </div>
                    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                    
                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus ">
                    
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
                                    value="{{ old('email') }}" required autocomplete="email" >
                    
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
                                <select class="form-select" aria-label="Default select example" name="section">
                                    <option selected id="section">Select Option</option>
                                    @foreach ($section as $sec)
                                        <option value="{{ $sec->id }}">{{ $sec->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        {{-- <div class="row mb-3">
                            <label for="form-select"
                                class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="role"
                                    id="form-select">
                                    <option>{{ $user->roles->pluck('name')[0] ?? '' }}</option>
                                    @foreach ($role as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                    
                        <div class="row mb-3">
                            <label for="form-select"
                                class="col-md-4 col-form-label text-md-end">{{ __('Profile Picture') }}</label>
                    
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="inputGroupFile01" name="image">
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                    </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
   <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    })
    function editData(id, url){
       $('#editForm').attr('action', url)
       $.ajax({
        url: `{{ route('superadmin.getData') }}`,
        data: {
            id:id
        },
        method: 'post',
        datatype: 'json',
        success: function(res){
            console.log(res);      
            $('#editModal').modal('show');
            $('#editModal #first').val(res.first);
            $('#editModal #last').val(res.last);
            $('#editModal #username').val(res.username);
            $('#editModal #email').val(res.email);
            $('#editModal #section').val(res.sections_id);
        }
       })
    }
    </script>
@endsection

