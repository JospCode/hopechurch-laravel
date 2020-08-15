@extends('layouts.adm')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Aprovação de Usuários</h1>
    </div>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <tr>
            <th>User name</th>
            <th>Email</th>
            <th>Registered at</th>
            <th></th>
        </tr>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td><a href="{{ route('admin.users.approve', $user->id) }}"
                    class="btn btn-primary btn-sm">Approve</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        @endforelse
    </table>
            
@endsection