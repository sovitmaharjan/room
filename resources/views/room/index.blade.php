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
                        <div class="col-sm-12 text-center mb-2">
                            <img src="{{ $value->getFirstMediaUrl('image') }}" alt="image"
                                class="img-responsive img-thumbnail" width="200">
                        </div>
                        <h3 class="card-title text-muted">{{ $value->name }}</h3>
                        <div class="text-center mt-2">
                            <a href="{{ route('room.edit', $value->id) }}"
                                class="btn btn-icon waves-effect btn-info btn-xs m-b-5"> <i class="fas fa-eye"></i> </a>
                            <a href="{{ route('room.edit', $value->id) }}"
                                class="btn btn-icon waves-effect btn-warning btn-xs m-b-5"> <i class="fas fa-pen"></i> </a>
                            <button type="button" class="btn btn-icon waves-effect btn-danger btn-xs m-b-5 delete"
                                data-id="{{ $value->id }}"> <i class="fas fa-times"></i> </button>
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
                        <li class="page-item {{ $active == $room->lastPage() ? 'disabled' : '' }}"><a href="{{ route('room.index') . '?page=' . $active + 1 }}"
                                class="page-link"><i class="fa fa-angle-right"></i></a>
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

    {{-- old code table --}}
    {{-- <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <div class="text-right mb-2">
                    <a href="{{ route('room.create') }}" class="btn btn-success waves-effect w-md waves-light m-b-5">
                        <i class="fas fa-plus"></i> Add</a>
                </div>
                <table id="room_table" class="table table-striped table-bordered dt-responsive nowrap text-center"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Room Type</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($room as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->roomType->title }}</td>
                                <td>Rs. {{ $value->price }}</td>
                                <td>
                                    @if ($value->availability == 1)
                                        <span class="badge badge-success">Available</span>
                                    @else
                                        <span class="badge badge-danger">Unavailable</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('room.edit', $value->id) }}"
                                        class="btn btn-icon waves-effect btn-warning btn-xs m-b-5"> <i
                                            class="fas fa-pen"></i> </a>
                                    <button type="button" class="btn btn-icon waves-effect btn-danger btn-xs m-b-5 delete"
                                        data-id="{{ $value->id }}"> <i class="fas fa-times"></i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
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
                    console.log(url);
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
        })
    </script>
@endsection
