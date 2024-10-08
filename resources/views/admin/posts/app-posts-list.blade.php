@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Posts')

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
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Owner</th>
                                        <th>{{__('locale.Title')}}</th>
                                        <th>{{__('locale.Image')}}</th>
                                        <th>{{__('locale.Created At')}}</th>
                                        <th>{{__('locale.Updated At')}}</th>
                                        <th>{{__('locale.Edit')}}</th>
                                        <th>{{__('locale.Delete')}}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td><a href="#{{-- route('admin.posts.edit', $post->id) --}}">{{ $post->title }}</a>
                                            </td>
                                            <td>
                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                                    <!-- Indicators (Dynamically Generated) -->
                                                    <ol class="carousel-indicators">
                                                        @foreach($post->images as $key => $image)
                                                            <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
                                                        @endforeach
                                                    </ol>

                                                    <!-- Carousel Inner (Dynamically Generated Images) -->
                                                    <div class="carousel-inner" >
                                                        @foreach($post->images as $key => $image)
                                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                <img class="img-fluid" src="{{ Storage::url($image->image_path) }}" alt="Slide {{ $key + 1 }}">
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Controls -->
                                                    <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('admin.posts.app-posts-edit', $post->id) }}"
                                                    title={{__("locale.Edit")}}><i class="bx bx-edit-alt "></i></a></td>
                                            <td>
                                                <form method="post" action="{{ route('posts.destroy', $post->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title={{__("locale.Delete")}}><i
                                                            class="bx bx-trash "></i></button>
                                                </form>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Owner</th>
                                        <th>{{__('locale.Title')}}</th>
                                        <th>{{__('locale.Image')}}</th>
                                        <th>{{__('locale.Created At')}}</th>
                                        <th>{{__('locale.Updated At')}}</th>
                                        <th>{{__('locale.Edit')}}</th>
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

    <!--/ Zero configuration table -->
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
