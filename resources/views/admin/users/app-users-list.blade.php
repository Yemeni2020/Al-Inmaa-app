@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title', 'Users List')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/app-users.css') }}">
@endsection

@section('content')
<h1>{{__('locale.Manage Users')}}</h1>
    <a href="{{ route('register') }}" class="btn btn-primary">{{__('locale.Create User')}}</a>
    <div class="divider div-primary"></div>
    <!-- users list start -->
    <section class="users-list-wrapper">
        <header><h4>{{__('locale.All Users')}}</h4></header>
        <div class="users-list-table">
            <div class="card">
                <div class="card-body">
                    <!-- datatable start -->
                    <div class="table-responsive">
                        <table id="users-list-datatable" class="table">
                            <thead>
                                <tr>
                                    <th>{{__('locale.Id')}}</th>
                                    <th>{{__('locale.Name')}}</th>
                                    <th>{{__('locale.Role')}}</th>
                                    <th>{{__('locale.Registered date')}}</th>
                                    <th>{{__('locale.Updated profile date')}}</th>
                                    <th>{{__('locale.Edit')}}</th>
                                    <td>{{__('locale.Delete')}}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href=" @if($user->name == Auth::user()->name){{  route('admin.users.app-user-profile', $user->id)  }}@endif">{{ $user->name }}</a> </td>
                                        <td>@if($user->roles->isNotEmpty())
                                            {{ $user->roles->pluck('name')->implode(', ') }}
                                        @else
                                            User has no roles
                                        @endif</td>
                                        <td>{{ $user->created_at->diffForhumans() }}</td>
                                        <td>{{ $user->updated_at->diffForhumans() }}</td>
                                        <td hidden></td>
                                        <td><a href="@if($user->id == Auth::user()->id){{route('admin.users.app-user-profile', $user->id)}} @elseif(auth()->user()->userHasRole('Admin')) {{route('admin.users.app-user-profile', $user->id)}}  @endif" alter="{{__("locale.Edit")}}"><i class="bx bx-edit-alt"></i></a></td>
                                        <td>
                                            {{-- <form method="post" action="{{route('user.destroy', $user->id)}}"> --}}
                                            <form method="post" action="#">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">{{__('locale.Delete')}}</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </section>
    <!-- users list ends -->
@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{ asset('js/scripts/pages/app-users.js') }}"></script>
@endsection
