@extends('superadmin.layouts.main')

@section('content')
    <h2>User</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" aria-label="First name" class="form-control" name="first"
                                        placeholder="First Name" autocomplete="first" autofocus>
                                    <input type="text" aria-label="Last name" class="form-control" name="last"
                                        placeholder="Last Name" autocomplete="last">
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
                                <input id="name" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>

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
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
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
                                    <option selected>Open this select menu</option>
                                    @foreach ($section as $sec)
                                        <option value="{{ $sec->id }}">{{ $sec->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="form-select"
                                class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="role"
                                    id="form-select">
                                    <option selected>Open this select menu</option>
                                    @foreach ($role as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="form-select"
                                class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="men"
                                        value="men">
                                    <label class="form-check-label" for="men">Men</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="women"
                                        value="women">
                                    <label class="form-check-label" for="women">Women</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Section</th>
                    <th scope="col">Role</th> 
                    <th scope="col">Picture</th>
                    <th scope="col">Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->sections->name }}</td>
                        <td id="role">{{ $user->roles->pluck('name')[0] ?? '' }}</td>
                        <td><img src="/storage/img/{{ $user->image }}" height="50"></td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary">
                                        <a href="{{ route('users.show', $user->id) }}" class="text-white">
                                            <span data-feather="eye"></span>
                                        </a>
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-warning edit" data-bs-toggle="modal" 
                                    onclick="edit({{ $user->id }}, `{{ route('users.update', $user->id) }}`)">
                                      <i data-feather="edit" class="text-white"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @include('superadmin.modal.edit')
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    })
    function edit(id, url){
       $('#editForm').attr('action', url)
       $.ajax({
        url: `{{ route('users.getData') }}`,
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
            $('#editModal #user-role').val($('#role').text());      
        }
       })
    }
    </script>
@endsection

