@extends('layouts.auth.app')

@section('content')
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <div class="m-t-10 m-b-10">
                                    <a href="index.html" class="text-success">
                                        <span><img src="{{ asset('assets/images/logo.png') }}" alt="" height="36"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input class="form-control" id="name" name="name" type="name" required=""
                                                placeholder="Fullname">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input class="form-control" id="email" name="email" type="email" required=""
                                                placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required="" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn w-md btn-danger btn-bordered waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
