@extends('layout.main')

@push('title')
<title>Dashboard</title>
@endpush

@section('main-section')
    <h1 class="my-5">Welcome, {{ session('fullname') }}</h1>
@endsection


