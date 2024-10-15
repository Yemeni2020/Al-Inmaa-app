@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Brands')

@section('content')
<div class="container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
    <h1>Brands</h1>
    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Add Brand</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                <td>
                    @if ($brand->logo)
                    <img src="{{ asset('storage/' . $brand->logo) }}" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection