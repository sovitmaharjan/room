@extends('layouts.app')

@section('page', 'Add')
@section('group', 'Room Type')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="text-right">
                    <a href="{{ route('room-type.index') }}" class="btn btn-success waves-effect w-md waves-light m-b-5"> <i
                            class="mdi mdi-format-list-bulleted"></i> Lists</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 m-t-20">
                        <form method="post" action="{{ route('room-type.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{ route('room-type.index') }}" class="btn btn-danger waves-effect waves-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
