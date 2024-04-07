
@extends('layouts.manager.main')

@section('title', 'manager | student Profile')

@section('content')

<main>
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="">student Profile </h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('manager.student.index') }}" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>

            </div>
            <div class="card-body">

                @include('partials.manager.alerts')
                <section>
                    <div class="container py-5">
                      <div class="row">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="card mb-4">
                            <div class="card-body text-center">
                              <img src="{{ asset('template/student_pics/' . $student->user->picture) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                              <h5 class="my-3">{{ $student->user->name }}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $student->user->name }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $student->user->email }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $student->user->gender }}</p>
                                </div>
                              </div>
                              <hr>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>
</main>
@endsection



