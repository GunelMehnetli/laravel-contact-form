@include('back.layouts.header')
<div class="container vh-100">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Hesab yarat!</h1>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
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

                    <form class="user" method="POST" action="{{ route('register.post') }}">
                    @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        type="text"
                                        class="form-control form-control-user"
                                        id="exampleFirstName"
                                        name="name"
                                        placeholder="Ad"
                                    />
                                </div>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control form-control-user"
                                        id="exampleLastName"
                                        name="surname"
                                        placeholder="Soyad"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control form-control-user"
                                    id="exampleInputEmail"
                                    name="email"
                                    placeholder="Email"
                                />
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        type="password"
                                        class="form-control form-control-user"
                                        id="exampleInputPassword"
                                        name="password"
                                        placeholder="Şifrə"
                                    />
                                </div>
                                <div class="col-sm-6">
                                    <input
                                        type="password"
                                        class="form-control form-control-user"
                                        id="exampleRepeatPassword"
                                        name="password_confirmation"
                                        placeholder="Şifrəni təkrarlayın"
                                    />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Qeydiyyatdan keçin</button>
                            <hr />
                            {{--<a
                                href="{{route('login')}}"
                                class="btn btn-google btn-user btn-block"
                            >
                                 Hesabınıza keçid edin
                            </a>--}}
                        </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@include('back.layouts.footer')
