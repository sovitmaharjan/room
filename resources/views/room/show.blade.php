@extends('layouts.app')

@section('page', 'Show')
@section('group', 'Room')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="text-right">
                    <a href="{{ route('room.index') }}" class="btn btn-success waves-effect w-md waves-light m-b-5"> <i
                            class="mdi mdi-format-list-bulleted"></i> Lists</a>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="col-sm-12 text-center mb-2" style="height: 250px; width: 100%; position: relative;">
                            <img src="{{ $room->getFirstMediaUrl('image') }}" alt="image" id="modal-image"
                                class="img-responsive img-thumbnail" width="400"
                                style="object-fit: contain; height: 100%">
                        </div>
                        <div class="text-center">
                            @if ($room->availability == 1)
                                <span class="badge badge-success">Available</span>
                            @else
                                <span class="badge badge-danger">Unavailable</span>
                            @endif
                        </div>
                        @can('isCustomer')
                            @if ($room->availability == 1)
                                <div class="text-center my-4">
                                    <a href="{{ route('booking.create', $room->id) }}"
                                        class="btn btn-icon waves-effect btn-success m-b-5 booking"> <i class="fas fa-book"></i>
                                        Book
                                        Now </a>
                                </div>
                            @endif
                        @endcan
                    </div>

                    <div class="col-xl-7 offset-xl-1 m-t-sm-50">
                        <h4 class="m-t-0 header-title"><b>Name: {{ $room->name }}</b></h4>
                        <h4 class="m-t-0 header-title"><b>Room Type: {{ $room->roomType->title }}</b></h4>
                        <h4 class="m-t-0 header-title"><b>Price: Rs. {{ $room->price }}</b></h4>
                        <h4 class="m-t-0 header-title"><b>Description: </b></h4>
                        <p class="m-b-30 font-15">
                            {{ $room->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
