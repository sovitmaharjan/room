@extends('layouts.app')

@section('page', 'Dashboard')
@section('group', 'Dashboard')

@section('style')
    <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-box-two widget-two-primary">
                <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
                <div class="wigdet-two-content">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">
                        Total Room</p>
                    <h2 class="mb-4"><span data-plugin="counterup">{{ $room_count }}</span></h2>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-box-two widget-two-warning">
                <i class="mdi mdi-layers widget-two-icon"></i>
                <div class="wigdet-two-content">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Booked
                    </p>
                    <h2 class="mb-4"><span data-plugin="counterup">{{ $booked_room_count }} </span></h2>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-box-two widget-two-danger">
                <i class="mdi mdi-access-point-network widget-two-icon"></i>
                <div class="wigdet-two-content">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">
                        Tital Revenue</p>
                    <h2 class="mb-4"><span data-plugin="counterup">{{ $total_revenue }}</span></h2>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-box-two widget-two-success">
                <i class="mdi mdi-account-convert widget-two-icon"></i>
                <div class="wigdet-two-content">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Today Revenue</p>
                    <h2 class="mb-4"><span data-plugin="counterup">{{ $today_revenue }}</span> </h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Room count by type</h4>

                <div class="inbox-widget slimscroll-alt" style="min-height: 372px;">
                    @foreach ($room_count_by_type as $item)
                        <div class="inbox-item">
                            <p class="inbox-item-author">{{ $item->roomType->title }}</p>
                            <p class="inbox-item-date">{{ $item->count }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Booked room count by type</h4>

                <div class="inbox-widget slimscroll-alt" style="min-height: 372px;">
                    @foreach ($booked_room_count_by_type as $item)
                        <div class="inbox-item">
                            <p class="inbox-item-author">{{ $item->roomType->title }}</p>
                            <p class="inbox-item-date">{{ $item->count }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('assets/plugins/flot-chart/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-chart/jquery.flot.crosshair.js') }}"></script>

    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>


    <script src="{{ asset('assets/pages/jquery.dashboard_2.js') }}"></script>
@endsection
