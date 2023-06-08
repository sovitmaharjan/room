@extends('layouts.app')

@section('page', 'List')
@section('group', 'Booking')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                @can('isCustomer')
                    <div class="text-right mb-2">
                        <a href="{{ route('room.index') }}" class="btn btn-success waves-effect w-md waves-light m-b-5"> <i
                                class="mdi mdi-format-list-bulleted"></i> Room List</a>
                    </div>
                @endcan
                <table id="booking_table" class="table table-striped table-bordered dt-responsive nowrap text-center"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Phone</th>
                            <th>Room</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bookings as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>{{ $value->extra['phone'] }}</td>
                                <td>{{ $value->room->name }}</td>
                                <td>{{ $value->from->format('Y-m-d') }} - {{ $value->to->format('Y-m-d') }}</td>
                                <td>{{ $value->duration }}</td>
                                <td>{{ $value->statuses()->latest()->first()->status }}</td>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <select class="form-control" id="status-{{ $value->id }}" name="status"
                                            style="margin-right: 10px;">
                                            <option value="">Select</option>
                                            @foreach ($status as $key2 => $value2)
                                                <option value="{{ $value2 }}">{{ $key2 }}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" data-id="{{ $value->id }}"
                                            class="btn btn-icon waves-effect btn-warning btn-xs m-b-5 update-status">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#booking_table').DataTable();

        $(document).on('click', '.update-status', function() {
            var id = $(this).data('id');
            var status = $('#status-' + id).val();
            if (status != '') {
                swal({
                    title: 'Are you sure?',
                    // text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4fa7f3',
                    cancelButtonColor: '#d57171',
                    confirmButtonText: 'Yes'
                }).then(function(result) {
                    if (result.value) {
                        var url = "{{ route('booking.update-status', ':id') }}";
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
                            name: 'status',
                            value: status
                        }))
                        $('body').append(form);
                        form.submit();
                    }
                });
            } else {
                $($('#status-' + id)).css({
                    "border": "1px solid #f1416c"
                });
                $(`
                    <div class="text-danger text-left">
                        Select status
                    </div>
                `).insertAfter($($('#status-' + id)).parent());
            }
        })
    </script>
@endsection
