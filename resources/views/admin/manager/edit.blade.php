@extends('layouts.admin.main')

@section('title', 'Admin | Add Managers')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Edit Manager</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('admin.manager.show',$manager) }}" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @include('partials.admin.alerts')

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') ? old('name') : $manager->user->name }}" placeholder="Enter the name">

                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') ? old('email') : $manager->user->email }}" placeholder="Enter the email">

                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="picture">Profile Picture</label>
                                    <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                        id="picture" name="picture">

                                    @error('picture')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" value="" placeholder="Enter the password">

                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="mb-3">
                            <label>Gender</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                                @if (strtolower(old('gender')) == 'male')
                                checked
                                @elseif ($manager->user->gender == 'Male')
                                checked
                                @endif >
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female"
                                @if (strtolower(old('gender')) == 'female')
                                checked
                                @elseif ($manager->user->gender == 'Female')
                                checked
                                @endif >
                                <label class="form-check-label" for="female">Female</label>
                            </div>

                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection

