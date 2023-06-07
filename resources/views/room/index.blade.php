@extends('layouts.app')

@section('page', 'List')
@section('group', 'Room')

@section('content')
    <div class="text-right mb-3">
        <a href="{{ route('room.create') }}" class="btn btn-success waves-effect w-md waves-light m-b-5"> <i
                class="fas fa-plus"></i> Add</a>
    </div>

    <div class="row">
        @foreach ($room as $key => $value)
            <div class="col-lg-3">
                <div class="card card-border">
                    <div class="card-heading text-center">
                        <div class="col-sm-12 text-center mb-2" style="height: 150px; width: 100%; position: relative;">
                            <img src="{{ $value->getFirstMediaUrl('image') }}" alt="image"
                                class="img-responsive img-thumbnail" width="200" style="object-fit: contain; height: 100%">
                        </div>
                        <h3 class="card-title text-muted">{{ $value->name }}</h3>
                        <h6 class="text-muted">Room Type: {{ $value->roomType->title }}</h6>
                        <div class="text-center mt-2">
                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"
                                class="btn btn-icon waves-effect btn-info btn-xs m-b-5 view" data-id="{{ $value->id }}"
                                data-name="{{ $value->name }}" data-price="{{ $value->price }}"
                                data-description="{{ $value->description }}" data-availability="{{ $value->availability }}"
                                data-room_type="{{ $value->roomType->title }}"
                                data-image="{{ $value->getFirstMediaUrl('image') }}"> <i class="fas fa-eye"></i> </a>
                            <a href="{{ route('room.edit', $value->id) }}"
                                class="btn btn-icon waves-effect btn-warning btn-xs m-b-5"> <i class="fas fa-pen"></i> </a>
                            <button type="button" class="btn btn-icon waves-effect btn-danger btn-xs m-b-5 delete"
                                data-id="{{ $value->id }}"> <i class="fas fa-times"></i> </button>
                        </div>
                        <div class="text-center">
                            @if ($value->availability == 1)
                                <span class="badge badge-success">Available</span>
                            @else
                                <span class="badge badge-danger">Unavailable</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            @if (strlen($value->description > 100))
                                {{ substr($value->description, 0, 100) }} ...
                            @else
                                {{ $value->description }}
                            @endif
                        </p>
                    </div>
                    <div class="text-center mb-4">
                        @if ($value->availability == 1)
                            <a href="{{ route('room.edit', $value->id) }}"
                                class="btn btn-icon waves-effect btn-success m-b-5"> <i class="fas fa-book"></i> Book Now
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12 m-t-50 d-flex justify-content-center">
            <ul class="pagination">
                @if ($room->total() > 0)
                    @if ($room->lastPage() > 4)
                        @php
                            $first = 1;
                            $last = $room->lastPage();
                            $active = $room->currentPage();
                        @endphp
                        <li class="page-item {{ $active == 1 ? 'disabled' : '' }}">
                            <a href="{{ route('room.index') . '?page=' . $active - 1 }}" class="page-link"><i
                                    class="fa fa-angle-left"></i></a>
                        </li>
                        @if ($active - 1 != $first)
                            <li class=" page-item {{ $active == $first ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $first }}"
                                    class="page-link">{{ $first }}</a>
                            </li>
                        @endif
                        @if ($active - 2 >= $first + 1)
                            <li class="page-item">
                                <a href="#" class="page-link">...</a>
                            </li>
                        @endif
                        @if ($active == $last)
                            <li class="page-item {{ $active == $active - 2 ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $active - 2 }}"
                                    class="page-link">{{ $active - 2 }}</a>
                            </li>
                        @endif
                        @if ($active > $first)
                            <li class="page-item {{ $active == $active - 1 ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $active - 1 }}"
                                    class="page-link">{{ $active - 1 }}</a>
                            </li>
                        @endif
                        @if ($active != $first)
                            <li class="page-item {{ $active == $active ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $active }}"
                                    class="page-link">{{ $active }}</a>
                            </li>
                        @endif
                        @if ($active < $last)
                            <li class="page-item {{ $active == $active + 1 ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $active + 1 }}"
                                    class="page-link">{{ $active + 1 }}</a>
                            </li>
                        @endif
                        @if ($active == $first)
                            <li class="page-item {{ $active == $active + 2 ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $active + 2 }}"
                                    class="page-link">{{ $active + 2 }}</a>
                            </li>
                        @endif
                        @if ($active + 2 <= $last - 1)
                            <li class="page-item">
                                <a href="#" class="page-link">...</a>
                            </li>
                        @endif
                        @if ($active + 1 < $last)
                            <li class="page-item {{ $active == $last ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $last }}"
                                    class="page-link">{{ $last }}</a>
                            </li>
                        @endif
                        <li class="page-item {{ $active == $room->lastPage() ? 'disabled' : '' }}"><a
                                href="{{ route('room.index') . '?page=' . $active + 1 }}" class="page-link"><i
                                    class="fa fa-angle-right"></i></a>
                        </li>
                    @else
                        <li class="page-item {{ $room->currentPage() == 1 ? 'disabled' : '' }}"><a
                                href="{{ route('room.index') . '?page=' . $room->currentPage() - 1 }}" class="page-link"><i
                                    class="fa fa-angle-left"></i></a>
                        </li>
                        @for ($i = 1; $i <= $room->lastPage(); $i++)
                            <li class="page-item {{ $room->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ route('room.index') . '?page=' . $i }}"
                                    class="page-link">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $room->currentPage() == $room->lastPage() ? 'disabled' : '' }}"><a
                                href="{{ route('room.index') . '?page=' . $room->currentPage() + 1 }}" class="page-link"><i
                                    class="fa fa-angle-right"></i></a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0" id="modal-name">{{ $value->name }} (Room Type:
                        {{ $value->roomType->title }})</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="col-sm-12 text-center mb-2">
                        <img src="" alt="image" id="modal-image" class="img-responsive img-thumbnail"
                            width="400">
                    </div>
                    <div class="text-center mt-2">
                        <a href="" id="modal-edit" class="btn btn-icon waves-effect btn-warning btn-xs m-b-5"> <i
                                class="fas fa-pen"></i> </a>
                        <button type="button" id="modal-delete"
                            class="btn btn-icon waves-effect btn-danger btn-xs m-b-5 delete"> <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="text-center" id="modal-availability"></div>
                    <p class="my-2">
                        {{ $value->description }}
                    </p>
                    <div id="modal-book"></div>
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
            $('#modal-name').html(`${ahref.data('name')} (Room Type: ${ahref.data('room_type')})`);
            $('#modal-image').attr('src', ahref.data('image'));
            var editUrl = "{{ route('room.edit', ':id') }}";
            editUrl = editUrl.replace(":id", ahref.data('id'));
            $('#modal-edit').attr('src', editUrl);
            var deleteUrl = "{{ route('room.destroy', ':id') }}";
            deleteUrl = deleteUrl.replace(":id", ahref.data('id'));
            $('#modal-delete').attr('src', deleteUrl);
            $('#modal-delete').attr('data-id', ahref.data('id'));
            $('#modal-availability').html(ahref.data('availability') == 1 ?
                '<span class="badge badge-success">Available</span>' :
                '<span class="badge badge-danger">Unavailable</span>');
            var book = ahref.data('availability') == 1 ?
                `<a href="${editUrl}" class="btn btn-icon waves-effect btn-success m-b-5"> <i class="fas fa-book"></i> Book Now </a>` :
                '';
            $('#modal-book').html(book);
        })
    </script>
@endsection
