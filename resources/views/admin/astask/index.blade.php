<!-- resources/views/manager/assingtask/index.blade.php -->

@extends('layouts.admin.main')

@section('title', 'student | assingtasks')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Taskes</h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    @include('partials.admin.alerts')

                    @if (count($assingtasks) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>date</th>
                                    <th>student</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assingtasks as $assingtask)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $assingtask->date }}</td>
                                        <td>{{ $assingtask->student->user->name }}</td>

                                        <td>{{ $assingtask->category->name }}</td>
                                        <td style="
                                        @if($assingtask->status == 'To Do') color: blue; @endif
                                        @if($assingtask->status == 'In progress') color: orange; @endif
                                        @if($assingtask->status == 'Completed') color: green; @endif
                                    ">
                                        {{ ucfirst($assingtask->status) }}
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
