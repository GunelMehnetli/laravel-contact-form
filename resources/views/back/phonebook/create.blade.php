@extends('back.layouts.master')
@section('title', 'Yeni Contact List əlavə et')

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
                    <form method="POST" action="{{ route('phonebook.store') }}" class="row">
                        @csrf
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ad</label>
                                <input type="text" class="form-control" id="full_name" name="name" required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Soyad</label>
                                <input type="text" class="form-control" id="full_name" name="surname" required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ata adı</label>
                                <input type="text" class="form-control" id="full_name" name="father_name" required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="faks">Faks</label>
                                <input type="text" class="form-control" id="faks" name="fax">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="company_name">Müəssisənin adı</label>
                                <select class="form-control" id="entrance" name="organization">
                                    @foreach ($organizations as $organization)
                                        <option value="{{ $organization['id'] }}^{{ $organization['name'] }}">
                                            {{ $organization['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="phone_numbers">Nömrələr</label>
                                <div id="phone_numbers_container">
                                    <input type="text" class="form-control" name="phone_number" required>
                                </div>
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
