@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Create Services')

@section('content')
    <h1>{{__('locale.Create Service')}}</h1>
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{__('locale.Title')}}</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">{{__('locale.Description')}}</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">{{__('locale.Image')}}</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">{{__('locale.Create')}}</button>
    </form>
@endsection
