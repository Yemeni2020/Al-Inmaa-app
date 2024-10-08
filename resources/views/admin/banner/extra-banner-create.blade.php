@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Banners')

@section('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
@endsection
@if (session('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@elseif(session('post-created-message'))
    <div class="alert alert-success">{{ session('post-created-message') }}</div>
@elseif(session('post-updated-message'))
    <div class="alert alert-success">{{ session('post-updated-message') }}</div>
@endif

@section('content')
<div class="container">
    <h2>{{__('locale.Upload Banner')}}</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf



        <div class="form-group">
            <label for="image">{{__('locale.Banner Image')}}</label>
            <input type="file" class="form-control" name="image" id="image" multiple>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{__('locale.Upload')}}</button>
    </form>
</div>

<div class="pb-1 mb-4"></div>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.Slider')}}</h4>
                </div>
                <div class="card-body card-dashboard">

                    <div class="table-responsive">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>{{__('locale.Id')}}</th>
                                    <th>{{__('locale.Image')}}</th>
                                    <th>{{__('locale.Created At')}}</th>
                                    <th>{{__('locale.Updated At')}}</th>
                                    <th>{{__('locale.Delete')}}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner as $banners)
                                    <tr>
                                        <td>{{ $banners->id }}</td>
                                        <td>
                                            <img src="{{ Storage::url($banners->image_path) }}" height="25%" width="25%" alt="Image">
                                        </td>
                                        <td>{{ $banners->created_at->diffForHumans() }}</td>
                                        <td>{{ $banners->updated_at->diffForHumans() }}</td>

                                        <td>
                                            <form method="post" action="{{ route('banner.destroy', $banners->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Delete"><i
                                                        class="bx bx-trash "></i></button>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{__('locale.Id')}}</th>
                                    <th>{{__('locale.Image')}}</th>
                                    <th>{{__('locale.Created At')}}</th>
                                    <th>{{__('locale.Updated At')}}</th>
                                    <th>{{__('locale.Delete')}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('vendor-scripts')
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
        @if (Session::has('successs'))
            toastr.success("{{ Session::get('successs') }}");
        @endif
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
@endsection
