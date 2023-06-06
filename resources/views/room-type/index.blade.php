@extends('layouts.app')

@section('page', 'List')
@section('group', 'Room Type')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <div class="text-right mb-2">
                    <a href="{{ route('room-type.create') }}" class="btn btn-success waves-effect w-md waves-light m-b-5"> <i
                            class="fas fa-plus"></i> Add</a>
                </div>
                <table id="room_type_table" class="table table-striped table-bordered dt-responsive nowrap text-center"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($room_type as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->title }}</td>
                                <td>
                                    <a href="{{ route('room-type.edit', $value->id) }}"
                                        class="btn btn-icon waves-effect btn-warning m-b-5"> <i class="fas fa-pen"></i> </a>
                                    <button type="button" class="btn btn-icon waves-effect btn-danger m-b-5 delete"
                                        data-id="{{ $value->id }}"> <i class="fas fa-times"></i> </button>
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
        $('#room_type_table').DataTable();

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
                    var url = "{{ route('room-type.destroy', ':id') }}";
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
