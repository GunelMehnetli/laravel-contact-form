@extends('back.layouts.master')
@section('title', 'Yeni Contact List əlavə et')

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
                                <input type="text" class="form-control" id="company_name" name="company_id" required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="company_name">Müəssisənin adı</label>

                                <select class="form-control" id="entrance">
                                    <optgroup label="Attention Seekers">
                                        <option value="bounce">bounce</option>
                                        <option value="flash">flash</option>
                                        <option value="pulse">pulse</option>
                                        <option value="rubberBand">rubberBand</option>
                                        <option value="shake">shake</option>
                                        <option value="swing">swing</option>
                                        <option value="tada">tada</option>
                                        <option value="wobble">wobble</option>
                                        <option value="jello">jello</option>
                                    </optgroup>
                                    <optgroup label="Bouncing Entrances">
                                        <option value="bounceIn" selected>bounceIn</option>
                                        <option value="bounceInDown">bounceInDown</option>
                                        <option value="bounceInLeft">bounceInLeft</option>
                                        <option value="bounceInRight">bounceInRight</option>
                                        <option value="bounceInUp">bounceInUp</option>
                                    </optgroup>
                                    <optgroup label="Fading Entrances">
                                        <option value="fadeIn">fadeIn</option>
                                        <option value="fadeInDown">fadeInDown</option>
                                        <option value="fadeInDownBig">fadeInDownBig</option>
                                        <option value="fadeInLeft">fadeInLeft</option>
                                        <option value="fadeInLeftBig">fadeInLeftBig</option>
                                        <option value="fadeInRight">fadeInRight</option>
                                        <option value="fadeInRightBig">fadeInRightBig</option>
                                        <option value="fadeInUp">fadeInUp</option>
                                        <option value="fadeInUpBig">fadeInUpBig</option>
                                    </optgroup>
                                    <optgroup label="Flippers">
                                        <option value="flipInX">flipInX</option>
                                        <option value="flipInY">flipInY</option>
                                    </optgroup>
                                    <optgroup label="Lightspeed">
                                        <option value="lightSpeedIn">lightSpeedIn</option>
                                    </optgroup>
                                    <optgroup label="Rotating Entrances">
                                        <option value="rotateIn">rotateIn</option>
                                        <option value="rotateInDownLeft">rotateInDownLeft</option>
                                        <option value="rotateInDownRight">rotateInDownRight</option>
                                        <option value="rotateInUpLeft">rotateInUpLeft</option>
                                        <option value="rotateInUpRight">rotateInUpRight</option>
                                    </optgroup>
                                    <optgroup label="Sliding Entrances">
                                        <option value="slideInUp">slideInUp</option>
                                        <option value="slideInDown">slideInDown</option>
                                        <option value="slideInLeft">slideInLeft</option>
                                        <option value="slideInRight">slideInRight</option>
                                    </optgroup>
                                    <optgroup label="Zoom Entrances">
                                        <option value="zoomIn">zoomIn</option>
                                        <option value="zoomInDown">zoomInDown</option>
                                        <option value="zoomInLeft">zoomInLeft</option>
                                        <option value="zoomInRight">zoomInRight</option>
                                        <option value="zoomInUp">zoomInUp</option>
                                    </optgroup>

                                    <optgroup label="Specials">
                                        <option value="rollIn">rollIn</option>
                                    </optgroup>
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
                            <button type="submit" class="btn btn-primary">Əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
