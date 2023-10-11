@extends('back.layouts.master')
@section('title', 'Silinmiş İstifadəçilər')
@section('content')


    <div class="container-fluid">
        <div class="container-fluid">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>@yield('title')</b></h2>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="align-middle">
                                    <th class="text-center">Ad</th>
                                    <th class="text-center">Soyad</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Əməliyyatlar</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td align="center">
                                            <a href="{{ route('user.recover', $user->id) }}" title="Silməkdən qurtar"
                                                class="btn text-primary"><i class="fa-solid fa-recycle"></i></a>
                                            <a href="{{ route('hard.user.delete', $user->id) }}" title="Sil"><em
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
