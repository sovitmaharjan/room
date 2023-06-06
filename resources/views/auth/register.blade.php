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
                                        <span><img src="assets/images/logo.png" alt="" height="36"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" action="#">

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input class="form-control" type="text" required=""
                                                placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input class="form-control" type="password" required=""
                                                placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="checkbox checkbox-success pl-1">
                                                <input id="checkbox-signup" type="checkbox" checked>
                                                <label for="checkbox-signup">
                                                    Remember me
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group text-center m-t-30">
                                        <div class="col-sm-12">
                                            <a href="page-recoverpw.html" class="text-muted"><i
                                                    class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>


                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html"
                                        class="text-primary m-l-5"><b>Sign Up</b></a></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
