@extends('layouts.app')

@section('page', 'Add')
@section('group', 'Room Type')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="text-center">
                    <h4 class="m-t-0 header-title"><b>Booking for Room: {{ $room->name }}</b></h4>
                    <h4 class="m-t-0 header-title"><b>Room Type: {{ $room->roomType->title }}</b></h4>
                </div>
                <div class="row">
                    <div class="col-lg-12 m-t-20">
                        <form method="post" action="{{ route('booking.store', $room->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="text" class="form-control datepicker" id="from" name="from"
                                    value="{{ old('from') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="to">To</label>
                                <input type="text" class="form-control datepicker" id="to" name="to"
                                    value="{{ old('to') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}" placeholder="0000000000" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{ route('booking.index') }}"
                                    class="btn btn-danger waves-effect waves-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
