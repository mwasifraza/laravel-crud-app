@extends('layout.main')

@push('title')
<title>{{ $title }}</title>
@endpush

@section('main-section')
<div class="row">
    <div class="col-sm-4 mx-auto">
        <form action="{{ $url }}" method="post" class="my-4 border p-3 rounded">
            
            @csrf
            <h3>{{ $title }}!</h3>
            <hr>
            <x-input label="Full Name" type="text" name="fullname" value="{{ $student->fullname ?? '' }}" />
            <x-input label="Email" type="email" name="email" value="{{ $student->email ?? '' }}" />
            <x-input label="Username" type="username" name="username" value="{{ $student->username ?? '' }}" />
            <x-input label="Password" type="password" name="password" />
            <x-input label="Confirm Password" type="password" name="confirm_password" />

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="">--Gender--</option>
                    @if(!isset($student))
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    @else
                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }} >Male</option>
                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }} >Female</option>
                    @endif
                </select>
                <small class="text-danger">
                    @error('gender') {{ $message }} @enderror
                </small>
            </div>

            <div class="d-grid">
                <button class="btn btn-warning">{{ $btn }} Data</button>
            </div>

        </form>
    </div>
</div>

@endsection

