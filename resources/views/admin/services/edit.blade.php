@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Create Service')
@section('content')
    <h1>{{__('locale.Edit Service')}}</h1>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use the PUT method for updating data -->

        <div class="form-group">
            <label for="title">{{__('locale.Title')}}</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $service->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">{{__('locale.Description')}}</label>
            <textarea name="description" id="description" class="form-control" required>{{ $service->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">{{__('locale.Image')}}</label>
            @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" width="150" alt="{{ $service->title }}">
                <br>
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{__('locale.Update Service')}}</button>
    </form>
@endsection
