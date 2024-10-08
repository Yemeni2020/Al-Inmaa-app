@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Create Post')

@section('content')
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('locale.Create a Product')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <fieldset class="form-group">
                                        <label for="basicInput">{{__('locale.Title')}}</label>
                                        <input type="text" name="title" class="form-control round shadow "
                                            id="title" placeholder="{{__('locale.Enter The Title')}}">
                                    </fieldset>


                                </div>
                                <div class="col-8">
                                    <fieldset class="form-group">
                                        <label for="content" class="form-label">{{__('locale.contents')}}</label>
                                        <textarea data-length=1000 class="form-control char-textarea round shadow" id="content" name="content" rows="5"
                                            placeholder="{{__('locale.any')}}"></textarea>

                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">0</span> / 1000
                                    </small>
                                </div>
                                <br>
                                <div class="col-8">
                                    <fieldset class="form-group">
                                        <label class="custom-file-label" for="images"><i class="bx bx-camera"></i>
                                            {{__('locale.Image')}}</label>
                                        <input type="file" class="custom-file-input" id="images" name="images[]" multiple>

                                    </fieldset>

                                </div>


                                <div class="col-md-8">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">{{__('locale.Submit')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>


@endsection


{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{ asset('vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
    <script src="{{ asset('js/scripts/forms/form-repeater.js') }}"></script>
@endsection

                                {{-- <div class="col-12 form-group file-repeater">
                                    <div data-repeater-list="repeater-list">
                                        <div data-repeater-item>
                                            <div class="row mb-2">
                                                <div class="col-9 col-lg-8 mb-1">
                                                    <label for="images" class="form-label">Image</label>
                                                    <input type="file" id="images" name="images[]">
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image" ><i class="bx bx-camera"></i>
                                                        Image</label>
                                                </div>
                                                <div class="col-3 col-lg-4 text-lg-right">
                                                    <button class="btn btn-icon btn-danger " type="button"
                                                        data-repeater-delete>
                                                        <i class="bx bx-x"></i>
                                                        <span class="d-lg-inline-block d-none">Delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col form-group p-0 ">
                                        <button class="btn btn-primary " data-repeater-create type="button">
                                            <i class="bx bx-plus "></i>Add
                                        </button>
                                    </div>
                                </div> --}}
