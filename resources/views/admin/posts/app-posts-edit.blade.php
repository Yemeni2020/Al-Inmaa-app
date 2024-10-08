@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Edit a Post')


@section('content')

    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit a Post</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-8">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" name="title" class="form-control round shadow "
                                            id="title" placeholder="Enter The Title" value="{{ $post->title }}">
                                    </fieldset>


                                </div>
                                <div class="col-8">
                                    <fieldset class="form-group">
                                        <label for="content" class="form-label">contents</label>
                                        <textarea data-length=1000 class="form-control char-textarea round shadow" id="content" name="content" rows="5"
                                            placeholder="any">{{$post->content}}</textarea>

                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">0</span> / 1000
                                    </small>
                                </div>
                                <div class="col-8">
                                    <fieldset class="form-group">
                                        <div>
                                            @foreach ($post->images as $image)
                                                <img src="{{ Storage::url($image->image_path) }}" height="100px"
                                                    alt="Image">
                                            @endforeach
                                        </div>
                                        <label class="custom-file-label" for="images"><i class="bx bx-camera"></i>
                                            Image</label>
                                        <input type="file" class="custom-file-input" id="images" name="images[]"
                                            multiple>

                                    </fieldset>

                                </div>


                                <div class="col-md-8">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
