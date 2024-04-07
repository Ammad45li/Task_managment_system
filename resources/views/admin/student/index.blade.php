@extends('layouts.admin.main')

@section('title', 'Admin | Users')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Users</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('admin.student.create') }}" class="btn btn-outline-primary">Add User</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @include('partials.admin.alerts')

                    @if (count($students) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->user->name }}</td>
                                        <td>{{ $student->user->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.student.show' ,$student) }}"
                                                class="btn btn-primary">Profile</a>
                                            <form action="{{ route('admin.student.destroy' , $student) }}" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info" role="alert">
                            No record found!
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </main>
    {{-- @include('partials.admin.footer') --}}
@endsection
