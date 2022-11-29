@extends('admin.layouts.main')


@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card p-3 py-4">
                        <div class="text-center">
                            <img src="/storage/img/{{ auth()->user()->image  }}" width="100" class="rounded-circle">
                        </div>
                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0">
                                {{ auth()->user()->first }} {{ auth()->user()->last }}
                            </h5>
                            <span>{{ auth()->user()->sections->name }}</span>
                            <h5>
                                Email : {{ auth()->user()->email }}
                            </h5>
                            <h5>
                                Gender : {{ auth()->user()->gender }}
                            </h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>

@endsection
