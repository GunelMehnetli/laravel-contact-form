@extends('back.layouts.master')
@section('title', 'İstifadəçilərin siyahısı')
@section('content')

    <div class="container-fluid vh-100">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>@yield('title', 'İstifadəçilərin siyahısı')</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i
                                class="fa-solid fa-circle-plus"></i><span>Əlavə
                                et</span></a>
                        <a href="{{ route('user.trashed') }}" class="btn btn-warning "><i class="fa fa-trash"></i>Silmiş
                            İstifadəçilər</a>

                        <a href="" class="btn btn-primary"><i class="fas fa-key"></i><span>Role</span></a>
                        <a href="" class="btn btn-warning "><i class="fas fa-check-circle"></i>Permission</a>
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
                                <th class="text-center">Ad</th>
                                <th class="text-center">Soyad</th>
                                <th class="text-center">Ata adı</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Əməliyyatlar</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->father_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td align="center">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn "><em
                                                class="fas fa-edit fa-lg text-primary"></em></a>
                                        <a href="{{ route('user.delete', $user->id) }}"><em
                                                class="fas fa-trash fa-lg text-danger"></em></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
