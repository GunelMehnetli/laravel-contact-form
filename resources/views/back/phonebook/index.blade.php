@extends('back.layouts.master')
@section('title', 'Contact List')
@section('content')

    <div class="container-fluid">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>@yield('title', 'Contact List')</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('phonebook.create') }}" class="btn btn-primary"><i
                                class="fa-solid fa-circle-plus"></i><span>Əlavə et</span></a>
                        <a href="{{ route('phonebook.trashed') }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-trash"></i>Silmiş Contact Listlər</a>
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
                                <th class="text-center">Fax</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Müəssisənin adı</th>
                                <th class="text-center">Telefon</th>
                                <th class="text-center">Əməliyyatlar</th>
                        </thead>
                        <tbody>
                            @foreach ($persons as $person)
                                <tr>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->surname }}</td>
                                    <td>{{ $person->father_name }}</td>
                                    <td>{{ $person->fax }}</td>
                                    <td>{{ $person->email }}</td>
                                    <td>{{ $person->company->company_name }}</td>
                                    <td>
                                        @foreach ($person->phones as $phone)
                                            {{ $phone->phone }}<br>
                                        @endforeach
                                    </td>
                                    <td align="center">
                                        <a href="{{ route('phonebook.edit', $person->id) }}" class="btn "><em
                                                class="fas fa-edit fa-lg text-primary"></em></a>
                                        <a href="{{ route('phonebook.delete', $person->id) }}"><em
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
