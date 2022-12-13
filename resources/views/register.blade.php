@extends('layout.main')

@push('title')
<title>Register</title>
@endpush

@section('main-section')
<div class="row">
    <div class="col-sm-4 mx-auto">
        <form action="/register" method="post" class="my-4 border p-3 rounded">
            
            @csrf
            <h3>Register Yourself!</h3>
            <hr>
            <x-input label="Full Name" type="text" name="fullname" />
            <x-input label="Email" type="email" name="email" />
            <x-input label="Username" type="username" name="username" />
            <x-input label="Password" type="password" name="password" />
            <x-input label="Confirm Password" type="password" name="confirm_password" />

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="">--Gender--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <small class="text-danger">
                    @error('gender') {{ $message }} @enderror
                </small>
            </div>
            <div class="d-grid">
                <button class="btn btn-warning">Submit Data</button>
            </div>

        </form>
    </div>
</div>

@endsection

