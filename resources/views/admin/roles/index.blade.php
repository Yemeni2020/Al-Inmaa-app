@extends('layouts.contentLayoutMaster')
@section('keywords')
    {{-- title --}}
@section('title', 'Roles')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>{{ __('locale.Manage Roles') }}</h1>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">{{ __('locale.Create Role') }}</a>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('locale.Name') }}</th>
                <th>{{ __('locale.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $roles)
                <tr>
                    <td>{{ $roles->name }}</td>

                    <td>
                        <a href="{{ route('admin.roles.edit', $roles) }}"
                            class="btn btn-sm btn-warning">{{ __('locale.Edit') }}</a>
                        <form action="{{ route('admin.roles.destroy', $roles) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">{{ __('locale.Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
