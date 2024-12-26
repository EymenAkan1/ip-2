@extends('layouts.admin')

@section('content')
    <h1>Audit Logs</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Action</th>
            <th>Table Name</th>
            <th>Occurred At</th>
            <th>Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->user ? $log->user->name : 'System' }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->table_name }}</td>
                <td>{{ $log->occurred_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <a href="{{ route('admin.audit_logs.show', $log->id) }}" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $logs->links() }}
@endsection
