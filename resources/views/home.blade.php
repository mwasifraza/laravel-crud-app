@extends('layout.main')

@push('title')
<title>Home</title>
@endpush

@section('main-section')
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <h2 class="text-center mt-4">Laravel CRUD Application</h2>
            <img src="{{url('imgs/home.png')}}" alt="" class="img-fluid my-4">
        </div>
    </div>
@endsection


