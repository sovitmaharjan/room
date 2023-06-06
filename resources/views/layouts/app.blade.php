<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.meta')

    <title>Room</title>

    @include('layouts.style')

</head>

<body class="fixed-left">

    <div id="wrapper">

        @include('layouts.header')

        @include('layouts.sidebar')

        <div class="content-page">

            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">@yield('page') </h4>
                                <ol class="breadcrumb p-0 m-0">
                                    @hasSection('title1')
                                        <li class="breadcrumb-item">
                                            @yield('title1')
                                        </li>
                                    @endif
                                    @hasSection('title2')
                                        <li class="breadcrumb-item">
                                            @yield('title1')
                                        </li>
                                    @endif
                                    <li class="breadcrumb-item active">
                                        @yield('page')
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    @yield('content')

                </div>

            </div>

            @include('layouts.footer')

        </div>
    </div>

    @include('layouts.script')

</body>

</html>
