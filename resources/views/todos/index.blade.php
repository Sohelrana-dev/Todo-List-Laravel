@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-white">{{ __('My Task List') }}</h2>
                </div>

                <div class="card-body">
                    <div class=" d-flex justify-content-between align-items-center">
                        <div>
                            <button type="button" class="btn btn-warning me-3">
                                Total Incomplete Task : <strong>{{ $incomplete_count }}</strong>
                            </button>
                            <button type="button" class="btn btn-success">
                                Total Completed Task : <strong>{{ $complete_count }}</strong>
                                </a>
                        </div>
                        <div>
                            <a href="{{ route('create.todo') }}" class="btn btn-success mb-3">
                                <i class="fas fa-plus"></i> Create Task
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Tilte</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($todos as $sl=>$todo)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>
                                <a href="javascript:void(0);"
                                    class="btn {{ $todo->is_completed == 0 ? 'btn-warning' : 'btn-success' }}"
                                    id="toggleStatusButton" data-id="{{ $todo->id }}"
                                    data-status="{{ $todo->is_completed }}">
                                    {{ $todo->is_completed == 0 ? 'Incomplete' : 'Completed' }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('task.view', $todo->id) }}"
                                    class="btn btn-info text-white mx-2">View</a>
                                <a href="{{ route('task.edit', $todo->id) }}" class="btn btn-secondary me-2">Edit</a>
                                <a href="{{ route('task.delete', $todo->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <div>
                            <td colspan="4" class="text-center">No Task Found</td>
                        </div>
                        @endforelse
                    </table>
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_content')
@if (session('add_success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "{{ session('add_success') }}"
    });

</script>
@endif
@if (session('task_delete'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "{{ session('task_delete') }}"
    });

</script>
@endif

<script>
    $(document).ready(function () {
        $(document).on('click', '#toggleStatusButton', function () {
            var button = $(this);
            var todoId = button.data('id');
            var currentStatus = button.data('status');

            $.ajax({
                url: '{{ route("task.toggleStatus") }}', // Update with route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: todoId,
                    status: currentStatus
                },
                success: function (response) {
                    if (response.success) {
                        var newStatus = response.new_status;
                        button.data('status', newStatus);
                        button.removeClass('btn-warning btn-success');
                        if (newStatus == 0) {
                            button.addClass('btn-warning').text('Incomplete');
                        } else {
                            button.addClass('btn-success').text('Completed');
                        }
                    } else {
                        alert('Failed to update status');
                    }
                }
            });
        });
    });

</script>

@endsection
