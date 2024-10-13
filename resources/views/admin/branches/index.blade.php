@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Contact Us')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card shadow-lg p-4 rounded-3 border-0">
                <h2 class="text-center mb-4 text-primary">{{__('locale.Branches Overview')}}</h2>

                <!-- Add Branch Button -->
                <div class="text-end mb-3">
                    <a href="{{ route('admin.branches.create') }}" class="btn btn-outline-success shadow-sm rounded-pill">
                        <i class="fas fa-plus"></i> {{__('locale.Add New Branch')}}
                    </a>
                </div>

                <!-- Branch List Table for Desktop -->
                <div class="table-responsive d-none d-lg-block">
                    <table class="table table-hover table-striped shadow-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="min-width: 150px;">{{__('locale.Branch Name')}}</th>
                                <th style="min-width: 250px;">{{__('locale.Address')}}</th>
                                <th style="min-width: 250px;">{{__('locale.Phone Numbers')}}</th>
                                <th style="min-width: 250px;">{{__('locale.Email Addresses')}}</th>
                                <th style="min-width: 150px;">{{__('locale.Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                            <tr>
                                <td>{{ $branch->name }}</td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" title="{{ $branch->address }}">
                                        {{ $branch->address }}
                                    </span>
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($branch->phones as $phone)
                                        <li>
                                            <span class="d-inline-block text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" title="{{ $phone->phone_number }}">
                                                <i class="fas fa-phone-alt text-primary"></i> {{ $phone->phone_number }}
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($branch->emails as $email)
                                        <li>
                                            <span class="d-inline-block text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" title="{{ $email->email_address }}">
                                                <i class="fas fa-envelope text-primary"></i> {{ $email->email_address }}
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn btn-outline-warning btn-sm rounded-pill shadow-sm mb-2">
                                        <i class="fas fa-edit"></i> {{__('locale.Edit')}}
                                    </a>
                                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill shadow-sm">
                                            <i class="fas fa-trash-alt"></i> {{__('locale.Delete')}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Card layout for Mobile (d-block on mobile, hidden on desktop) -->
                <div class="d-lg-none">
                    @foreach($branches as $branch)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $branch->name }}</h5>
                            <p class="card-text"><strong>{{__('locale.Address')}}:</strong> {{ $branch->address }}</p>
                            <p class="card-text"><strong>{{__('locale.Phone Numbers')}}:</strong>
                                <ul class="list-unstyled">
                                    @foreach($branch->phones as $phone)
                                    <li>{{ $phone->phone_number }}</li>
                                    @endforeach
                                </ul>
                            </p>
                            <p class="card-text"><strong>{{__('locale.Email Addresses')}}:</strong>
                                <ul class="list-unstyled">
                                    @foreach($branch->emails as $email)
                                    <li>{{ $email->email_address }}</li>
                                    @endforeach
                                </ul>
                            </p>
                            <div class="text-end">
                                <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn btn-outline-warning btn-sm rounded-pill shadow-sm">
                                    <i class="fas fa-edit"></i> {{__('locale.Edit')}}
                                </a>
                                <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill shadow-sm">
                                        <i class="fas fa-trash-alt"></i> {{__('locale.Delete')}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
