@extends('back.layouts.master')
@section('title', 'Silinmiş Contact Listlər')
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
                                            <a href="{{ route('phonebook.recover', $person->id) }}" title="Silməkdən qurtar"
                                                class="btn text-primary"><i class="fa-solid fa-recycle"></i></a>
                                            <a href="{{ route('hard.phonebook.delete', $person->id) }}" title="Sil"><em
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
