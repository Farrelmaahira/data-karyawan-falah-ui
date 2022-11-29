@extends('superadmin.layouts.main')

@section('content')
    <h2>Position</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Position
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Position</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sections.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
                        <input class="form-control" type="text" placeholder="Position" aria-label="default input example"
                            name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="table-responsive">
        <table class="table table-striped table-sm" id="datatable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($position as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-2">
                                    <form action="{{ route('sections.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-warning edit" type="button" data-bs-toggle="modal"
                                        data-id="{{ $item->id }}" data-first="{{ $item->name }}" data-bs-target="#editModal">
                                        <i data-feather="edit" class="text-white"></i>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </td>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Position</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('sections.update', $item->id) }}" method="post" id="editForm">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <label for="name"
                                                class="col-md-4 col-form-label">{{ __('Name') }}</label>
                                            <input class="form-control" type="text" placeholder="Position"
                                                aria-label="default input example" name="name" id="name">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('first');
                $('#editModal').modal('show');
                $('#name').val(name);
            });

        });
    </script>
@endsection
