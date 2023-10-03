@include('back.layouts.header')
<div class="container vh-100">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Xoş gəlmisiniz!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{route('login.action')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="E-poçt ünvanını daxil edin...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifrə">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                           Daxil ol
                                        </button>
                                        <hr>
                                        <a href="{{route('register')}}" class="btn btn-google btn-user btn-block">
                                              Qeydiyyatdan keçin
                                        </a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@include('back.layouts.footer')
