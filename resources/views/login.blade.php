@extends('layout.main')

@push('title')
<title>Login</title>
@endpush

@section('main-section')
<div class="row">
    <div class="col-sm-4 mx-auto">
        <form action="{{ route('login.action') }}" method="post" class="my-4 border p-3 rounded">
            
            @csrf
            <h3>Login!</h3>
            <hr>
            <x-input label="Username" type="username" name="username" />
            <x-input label="Password" type="password" name="password" />

            <div class="d-grid mt-3">
                <button class="btn btn-warning">Login</button>
            </div>

        </form>
    </div>
</div>
@endsection

