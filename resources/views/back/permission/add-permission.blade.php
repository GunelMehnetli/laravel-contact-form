@extends('back.layouts.master')
@section('title', 'Yeni Permission əlavə et')

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
                    <form method="POST" action="{{ route('permission.store') }}" class="row">
                        @csrf
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Permission Name</label>
                                <input type="text" class="form-control" name="permission_name">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Group Name</label>
                                <select name="group_name" class="form-control">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="phonebbok">Phonebook</option>
                                    <option value="User">User</option>
                                </select>
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
