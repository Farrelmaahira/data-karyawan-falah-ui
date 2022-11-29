@extends('superadmin.layouts.main')


@section('content')
<a href="{{ route('users.index') }}" class="text-black text-decoration-none">
    <i data-feather="chevron-left"></i>
    Back
</a>
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card p-3 py-4">
                        <div class="text-center">
                            @foreach ($user as $item)
                            <img src="/storage/img/{{ $item->image }}" width="100" class="rounded-circle">
                        </div>
                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0">
                                {{ $item->first }} {{ $item->last }}
                            </h5>
                            <span>{{ $item->sections->name }}</span>
                            <h5>
                                Email : {{ $item->email }}
                            </h5>
                            <h5>
                                Gender : {{ $item->gender }}
                            </h5>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>

@endsection
