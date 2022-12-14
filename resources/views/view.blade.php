@extends('layout.main')

@push('title')
<title>View Data</title>
@endpush

@section('main-section')
<div class="row">
    <div class="col-sm-6 mx-auto">
        <div class="table-responsive my-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td scope="row">{{$student->student_id}}</td>
                        <td scope="row">{{$student->fullname}}</td>
                        <td scope="row">{{$student->email}}</td>
                        <td scope="row">{{$student->username}}</td>
                        <td scope="row">{{$student->gender}}</td>
                        <td scope="row">
                            <a href="{{ route('user.delete', ['id' => $student->student_id]) }}" class="btn btn-danger btn-sm"
                                style="--bs-btn-padding-y: .2rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                Delete
                            </a>
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection

