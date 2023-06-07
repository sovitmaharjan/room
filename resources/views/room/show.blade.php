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
                        <div class="text-center my-4">
                            <a href="{{ route('booking.create', $room->id) }}"
                                class="btn btn-icon waves-effect btn-success m-b-5 view"> <i class="fas fa-book"></i> Book
                                Now </a>

                            {{-- <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg"
                                class="btn btn-icon waves-effect btn-info m-b-5 view" data-id="{{ $room->id }}"
                                data-name="{{ $room->name }}" data-price="{{ $room->price }}"
                                data-description="{{ $room->description }}" data-availability="{{ $room->availability }}"
                                data-room_type="{{ $room->roomType->title }}"
                                data-image="{{ $room->getFirstMediaUrl('image') }}"> <i class="fas fa-eye"></i> View
                            </button> --}}
                        </div>
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

@section('script')
    <script>
        $('#room_table').DataTable();

        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                console.log(result);
                if (result.value) {
                    var url = "{{ route('room.destroy', ':id') }}";
                    url = url.replace(":id", id);
                    var form = $('<form></form>');
                    form.attr('method', 'POST');
                    form.attr('action', url);
                    form.append($('<input>').attr({
                        type: 'hidden',
                        name: '_token',
                        value: $('meta[name="csrf-token"]').attr('content')
                    }));
                    form.append($('<input>').attr({
                        type: 'hidden',
                        name: '_method',
                        value: 'DELETE'
                    }))
                    $('body').append(form);
                    form.submit();
                }
            })
        });

        $(document).on('click', '.view', function() {
            var ahref = $(this);
            $('#modal-name').html(ahref.data('name'));
            $('#modal-name-section').html(ahref.data('name'));
            $('#modal-room-type').html(ahref.data('room_type'));
            $('#modal-image').attr('src', ahref.data('image'));
            // var editUrl = "{{ route('room.edit', ':id') }}";
            // editUrl = editUrl.replace(":id", ahref.data('id'));
            // $('#modal-edit').attr('src', editUrl);
            // var deleteUrl = "{{ route('room.destroy', ':id') }}";
            // deleteUrl = deleteUrl.replace(":id", ahref.data('id'));
            // $('#modal-delete').attr('src', deleteUrl);
            // $('#modal-delete').attr('data-id', ahref.data('id'));
            $('#modal-availability').html(ahref.data('availability') == 1 ?
                '<span class="badge badge-success">Available</span>' :
                '<span class="badge badge-danger">Unavailable</span>');
            var bookUrl = "{{ route('room.edit', ':id') }}";
            bookUrl = bookUrl.replace(":id", ahref.data('id'));
            var book = ahref.data('availability') == 1 ?
                `<a href="${bookUrl}" class="btn btn-icon waves-effect btn-success m-b-5"> <i class="fas fa-book"></i> Book Now </a>` :
                '';
            $('#modal-book').html(book);
        })
    </script>
@endsection
