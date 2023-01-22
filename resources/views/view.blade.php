@extends('layout.main')

@push('title')
<title>View Data</title>
@endpush

@section('main-section')
<div class="row">
    <div class="col-sm-8 mx-auto">
        <div class="table-responsive my-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Verified</th>
                        <th scope="col">Username</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($students[0]->id))
                        @foreach ($students as $student)
                        <tr>
                            <td scope="row">{{$student->id}}</td>
                            <td scope="row">{{$student->fullname}}</td>
                            <td scope="row">{{$student->email}}</td>
                            <td scope="row">{{$student->email_verified_at ? "Yes" : "-"}}</td>
                            <td scope="row">{{$student->username}}</td>
                            <td scope="row">{{$student->gender}}</td>
                            <td scope="row">{{$student->role}}</td>
                            <td scope="row">
                                <a href="{{ route('user.delete', ['id' => $student->id]) }}" class="btn btn-danger btn-sm"
                                    style="--bs-btn-padding-y: .2rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                    Delete
                                </a>
                                <a href="{{ route('user.update', ['id' => $student->id]) }}" class="btn btn-warning btn-sm"
                                    style="--bs-btn-padding-y: .2rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                    Update
                                </a>
                            </td>
                        </tr>                    
                        @endforeach
                    @else
                    <tr>
                        <td colspan="7"><h4 class="text-center text-muted">There is nothing to show!</h4></td>
                    </tr>
                    @endif
                        
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection

