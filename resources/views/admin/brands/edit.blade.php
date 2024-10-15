@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Contact Us')

@section('content')

<div class="container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
    <h1>Edit Brand</h1>
    <form action="{{ route('admin.brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Brand Name</label>
            <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
        </div>
        <div class="form-group">
            <label for="logo">Brand Logo</label>
            <input type="file" name="logo" class="form-control">
            @if ($brand->logo)
            <img src="{{ asset('storage/' . $brand->logo) }}" width="50">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Brand</button>
    </form>
</div>

@endsection