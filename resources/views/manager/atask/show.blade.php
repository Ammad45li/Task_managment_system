@extends('layouts.manager.main')

@section('title', 'manager | assingtaske Profile')

@section('content')

<main>
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="">assingtaske Profile </h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('manager.task.index') }}" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>

            </div>
            <div class="card-body">

                @include('partials.manager.alerts')
                <section>
                    <div class="container py-5">
                      <div class="row">
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $assingtask->student->user->name }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $assingtask->email }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Date</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $assingtask->date }}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Taske</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{ $assingtask->category->name }}</p>
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




