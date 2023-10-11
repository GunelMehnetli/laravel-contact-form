@extends('back.layouts.master')
@section('title', 'İstifadəçi Məlumatlarını Dəyişdir')

@section('content')
    <div class="container-fluid vh-100">
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
                    <form method="POST" action="{{ route('user.update', $user->id) }}" class="row">
                        @csrf
                        @method('PUT')

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <select class="form-control" id="role" name="role">
                                    @foreach ($roles as $role)
                                        @if ($role->name != 'Standart-User')
                                            <option value="{{ $role->name }}"
                                                {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ad</label>
                                <input type="text" class="form-control" id="full_name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Soyad</label>
                                <input type="text" class="form-control" id="full_name" name="surname"
                                    value="{{ $user->surname }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ata adı</label>
                                <input type="text" class="form-control" id="full_name" name="father_name"
                                    value="{{ $user->father_name }}">
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="faks">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Yadda saxla</button>
                        </div>
                    </form>
                </div>
            </div>

        @endsection
