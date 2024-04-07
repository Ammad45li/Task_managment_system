<!-- resources/views/manager/assingtask/index.blade.php -->

@extends('layouts.manager.main')

@section('title', 'manager | assingtasks')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Taskes</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('manager.atask.create') }}" class="btn btn-outline-primary">Make Taske</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @include('partials.manager.alerts')

                    @if (count($assingtasks) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>date</th>
                                    <th>student</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assingtasks as $assingtask)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $assingtask->date }}</td>
                                        <td>{{ $assingtask->student->user->name }}</td>

                                        <td>{{ $assingtask->email }}</td>
                                        <td style="
                                        @if($assingtask->status == 'To Do') color: blue; @endif
                                        @if($assingtask->status == 'In progress') color: orange; @endif
                                        @if($assingtask->status == 'Completed') color: green; @endif
                                    ">
                                        {{ ucfirst($assingtask->status) }}
                                    </td>

                                        <td>
                                            <a href="{{ route('manager.atask.show' , $assingtask) }}" class="btn btn-primary">More About</a>
                                            <form action="{{ route('manager.atask.destroy' ,$assingtask) }}" method="post" class="d-inline">
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
    {{-- @include('partials.manager.footer') --}}
@endsection
