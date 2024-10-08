@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'User Profile')
{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/swiper.min.css') }}">
@endsection
{{-- page-styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/page-user-profile.css') }}">
@endsection

@section('content')

    <h1>{{ __('locale.User Profile for') }} : {{ $user->name }}</h1>
    <div class="card mb-4">
        <h5 class="card-header">{{ __('locale.Profile Details') }}</h5>
        <!-- Account -->
        <form id="formAccountSettings" method="post" action="{{ route('admin.users.update', $user) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="gap-4 d-flex align-items-start align-items-sm-center">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="d-block rounded"
                        height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="avatar" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">{{ __('locale.Upload new photo') }}</span>
                            <i class="bx bx-upload d-sm-none d-block"></i>
                            <input class="account-file-input" type="file" name="avatar" hidden id="avatar"
                                accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-sm-none d-block"></i>
                            <span class="d-none d-sm-block">{{ __('locale.Reset') }}</span>
                        </button>

                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">{{ __('locale.Full Name') }}</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                            name="name" value="{{ $user->name }}" autofocus />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">{{ __('locale.E-mail') }}</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                            value="{{ $user->email }}" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">{{ __('locale.Password') }}</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password"
                            name="password" />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password-confirmation" class="form-label">{{ __('locale.Confirm Password') }}</label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                            id="password-confirmation" name="password_confirmation" />
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">{{ __('locale.Save Changes') }}</button>
                    <button type="reset" class="btn btn-label-secondary">{{ __('locale.Cancel') }}</button>
                </div>
        </form>
    </div>
    <!-- /Account -->
    </div>

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

                                @foreach ($roles as $role)
                                    <tr>
                                        <td><input type="checkbox"
                                                @foreach ($user->roles as $user_role)
                                                        @if ($user_role->slug == $role->slug)
                                                            @checked(true)

                                                        @endif @endforeach>
                                        </td>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <form method="post" action="{{ route('user.role.attach', $user) }}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" value="{{ $role->id }}">
                                                <button type="submit"
                                                    class="btn btn-primary @if ($user->roles->contains($role)) disabled @endif">Attach</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form method="post" action="{{ route('user.role.detach', $user) }}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" value="{{ $role->id }}">
                                                <button type="submit"
                                                    class="btn btn-danger @if (!$user->roles->contains($role)) disabled @endif">Detach</button>
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


    <!-- / Content -->



@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{ asset('vendors/js/extensions/swiper.min.js') }}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{ asset('js/scripts/pages/page-user-profile.js') }}"></script>
@endsection
