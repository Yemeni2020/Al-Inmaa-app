@extends('layouts.contentLayoutMaster')
@section('keywords')
    {{-- title --}}
@section('title', 'Roles')

@section('content')
    <div class="container">
        <h1>Edit Role</h1>

        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" required>
            </div>



            <button type="submit" class="btn btn-success">Update Role</button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <br>

    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('locale.Roles for user') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('locale.Options') }}</th>
                                    <th>{{ __('locale.Id') }}</th>
                                    <th>{{ __('locale.Name') }}</th>
                                    <td>{{ __('locale.Attach') }}</td>
                                    <td>{{ __('locale.Detach') }}</td>
                                </tr>

                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('locale.Options') }}</th>
                                    <th>{{ __('locale.Id') }}</th>
                                    <th>{{ __('locale.Name') }}</th>
                                    <td>{{ __('locale.Attach') }}</td>
                                    <td>{{ __('locale.Detach') }}</td>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td><input type="checkbox"
                                                @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permission->slug)
                                                        @checked(true)

                                                    @endif @endforeach>
                                        </td>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <form method="post" action="{{ route('user.premission.attach', $role) }}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="permission" value="{{ $permission->id }}">
                                                <button type="submit"
                                                    class="btn btn-primary @if ($role->permissions->contains($permission)) disabled @endif">Attach</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form method="post" action="{{ route('user.premission.detach', $role) }}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="permission" value="{{ $permission->id }}">
                                                <button type="submit"
                                                    class="btn btn-danger @if (!$role->permissions->contains($permission)) disabled @endif">Detach</button>
                                            </form>
                                        </td>


                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
