@extends('admin.layouts.main')

@section('content')
    <h2>Section title</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Section</th>
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
                        <td><img src="{{ asset('storage/img/$user->image') }}"  height="100"></td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary">
                                        <a href="{{ route('user.show', $user->id) }}" class="text-white">
                                            <span data-feather="eye"></span>
                                        </a>
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
            @endsection
