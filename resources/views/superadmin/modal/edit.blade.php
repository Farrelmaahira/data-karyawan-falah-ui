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

    <div class="row mb-3">
        <label for="form-select"
            class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="role"
                id="form-select">
                <option id="user-role">Select Option</option>
                @foreach ($role as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
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

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>