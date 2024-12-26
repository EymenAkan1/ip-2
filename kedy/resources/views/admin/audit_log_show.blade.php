@extends('layouts.admin')

@section('content')
    <h1>Audit Log Details</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $auditLog->id }}</td>
        </tr>
        <tr>
            <th>User</th>
            <td>{{ $auditLog->user ? $auditLog->user->name : 'System' }}</td>
        </tr>
        <tr>
            <th>Action</th>
            <td>{{ $auditLog->action }}</td>
        </tr>
        <tr>
            <th>Table Name</th>
            <td>{{ $auditLog->table_name }}</td>
        </tr>
        <tr>
            <th>Occurred At</th>
            <td>{{ $auditLog->occurred_at->format('Y-m-d H:i:s') }}</td>
        </tr>
        <tr>
            <th>Changes</th>
            <td>
                <pre>{{ json_encode($auditLog->changes, JSON_PRETTY_PRINT) }}</pre>
            </td>
        </tr>
    </table>

    <a href="{{ route('admin.audit_logs.index') }}" class="btn btn-primary">Back to Logs</a>
@endsection
