@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-white">{{ __('Task Full View') }}</h2>
                    </div>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-info text-white">
                            <i class="fas fa-arrow-right"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-light">
                        <tr>
                            <th>Title :</th>
                            <td>{{ $task->title }}</td>
                        </tr>
                        <tr>
                            <th>Description :</th>
                            <td>{{ $task->description }}</td>
                        </tr>
                        <tr>
                            <th>Create Date :</th>
                            <td>{{ $task->created_at->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status :</th>
                            <td>
                                @if ($task->is_completed == 0)
                                <button type="button" class="btn btn-warning">Incomplete</button>
                                @else
                                <button type="button" class="btn btn-success">Complete</button>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
