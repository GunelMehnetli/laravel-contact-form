@extends('back.layouts.master')
@section('title', 'Permission siyahısı')
@section('content')

    <div class="container-fluid vh-100">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>@yield('title', 'Permission siyahısı')</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('permission.create') }}" class="btn btn-primary"><i
                                class="fa-solid fa-circle-plus"></i><span>Permission Əlavə
                                et</span></a>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="align-middle">
                                <th class="text-center">Permission Name</th>
                                <th class="text-center">Group Name</th>
                                <th class="text-center">Əməliyyatlar</th>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->group_name }}</td>
                                    <td align="center">
                                        <a href="" class="btn "><em
                                                class="fas fa-edit fa-lg text-primary"></em></a>
                                        <a href=""><em class="fas fa-trash fa-lg text-danger"></em></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
