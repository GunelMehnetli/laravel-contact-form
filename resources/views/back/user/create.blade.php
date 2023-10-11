@extends('back.layouts.master')
@section('title', 'Yeni istifadəçi əlavə et')

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
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('user.store') }}" class="row">
                        @csrf
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <select class="form-control" id="role" name="role">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ad</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Soyad</label>
                                <input type="text" class="form-control" name="surname" value="{{ old('surname') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ata adı</label>
                                <input type="text" class="form-control" name="father_name"
                                    value="{{ old('father_name') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="faks">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="faks">Şifrəni təkrarlayın</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Yadda saxla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
