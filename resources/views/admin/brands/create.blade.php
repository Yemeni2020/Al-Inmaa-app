@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Creat Brands')

@section('content')

<div class="container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
    <h1>Add Brand</h1>
    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Brand Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="logo">Brand Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Brand</button>
    </form>
</div>

@endsection