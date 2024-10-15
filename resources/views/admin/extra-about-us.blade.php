@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Create About Us')


@section('content')
<div class="container" align="right" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <h2 align="right">{{__('locale.Edit About Us Content')}}</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.extra-about-us.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="basicInput">{{__('locale.Title')}}</label>
            <input type="text" name="title" class="form-control round shadow " id="title"
                placeholder="{{__('locale.Enter The Title')}}" value="{{ old('content', $aboutUs->title ?? '') }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">{{__('locale.Content')}}</label>
            <textarea class="form-control" name="description" id="description"
                rows="8">{{ old('content', $aboutUs->description ?? '') }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- <div class="form-group">
            <label for="image">Update Image (optional):</label>
            <input class="form-control" type="file" name="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            
                <img src="{{ Storage::url($aboutUs->image) }}" height="100px" alt="Image">
           
        </div> -->

        <button type="submit" class="btn btn-primary mt-3">{{__('locale.Save')}}</button>
    </form>
</div>
@endsection