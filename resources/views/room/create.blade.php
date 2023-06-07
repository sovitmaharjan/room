@extends('layouts.app')

@section('page', 'Add')
@section('group', 'Room')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropify/css/dropify.css') }}" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="text-right">
                    <a href="{{ route('room.index') }}" class="btn btn-success waves-effect w-md waves-light m-b-5"> <i
                            class="mdi mdi-format-list-bulleted"></i> Lists</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 m-t-20">
                        <form method="post" action="{{ route('room.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="room_type_id">Room Type</label>
                                <select class="form-control" id="room_type_id" name="room_type_id" required>
                                    <option value="">Select</option>
                                    @foreach ($room_type as $item)
                                        <option value="{{ $item->id }}" @selected(old('room_type_id'))>{{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                                    value="{{ old('price') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="dropify" data-height="200" />
                            </div>
                            <div class="form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="availability">Availability</label><br />
                                <input type="hidden" name="availability" value="0" />
                                <input type="checkbox" class="" id="availability" name="availability"
                                    placeholder="Price" value="1" checked>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{ route('room.index') }}"
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
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });
    </script>
@endsection
