
@extends('layouts.admin.main')

@section('title', 'Admin | Manager Profile')

@section('content')

<main>
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="">Manager Profile </h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('admin.manager.create') }}" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>

            </div>
            <div class="card-body">

                @include('partials.admin.alerts')
                <section>
                    <div class="container py-5">
                      <div class="row">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="card mb-4">
                            <div class="card-body text-center">
                              <img src="{{ asset('template/manager_pics/' . $manager->user->picture) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                              <h5 class="my-3">{{ $manager->user->name }}</h5>
                              <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('admin.manager.edit' , $manager) }}" class="btn btn-primary">Edit Profile</a>
                              </div>
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
                                  <p class="text-muted mb-0">{{ $manager->user->name }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $manager->user->email }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $manager->user->gender }}</p>
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



