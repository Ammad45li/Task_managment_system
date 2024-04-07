
@extends('layouts.manager.main')

@section('title', 'Admin | Add appointment')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Make Taske</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('manager.atask.index') }}" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @include('partials.manager.alerts')
                    <form action="{{ route('manager.atask.create') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="student">student</label>
                                    <select name="student" id="student" class="form-select @error('student') is-invalid @enderror">
                                        <option value="" selected hidden disabled>Select a student</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}" {{ old('student') == $student->id ? 'selected' : '' }}>
                                                {{ $student->user->name }}
                                            </option>
                                        @endforeach
                                    </select>


                                    @error('student')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="Enter the email">

                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date">Date </label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date" value="{{ old('date') }}" placeholder="Enter the course date">

                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="category">Task</label>
                                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                                        <option value="" selected hidden disabled>Select a Task</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach


                                    </select>

                                    @error('category')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                </div>
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
