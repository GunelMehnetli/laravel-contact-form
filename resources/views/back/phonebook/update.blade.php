@extends('back.layouts.master')
@section('title', 'Contact Listi redaktə et')

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
                    <form method="POST" action="{{ route('phonebook.update', $person->id) }}" class="row">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ad</label>
                                <input type="text" class="form-control" id="full_name" name="name"
                                    value="{{ $person->name }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Soyad</label>
                                <input type="text" class="form-control" id="full_name" name="surname"
                                    value="{{ $person->surname }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Ata adı</label>
                                <input type="text" class="form-control" id="full_name" name="father_name"
                                    value="{{ $person->father_name }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="faks">Faks</label>
                                <input type="text" class="form-control" id="faks" name="fax"
                                    value="{{ $person->fax }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $person->email }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="company_name">Müəssisənin adı</label>
                                <input type="text" class="form-control" id="company_name" name="company_id"
                                    value="{{ $person->company_id }}">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="phone_numbers">Nömrələr</label>
                                <div id="phone_numbers_container">
                                    @foreach ($phoneNumbers as $phoneNumber)
                                        <input type="text" class="form-control" name="phone_numbers[]"
                                            value="{{ $phoneNumber->phone }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Redaktə et</button>
                        </div>
                    </form>
                </div>
            </div>

        @endsection
