@extends('layouts.contentLayoutMaster')
@section('keywords')
{{-- title --}}
@section('title', 'Services')

@section('content')
<div dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">

@if (session('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@elseif(session('post-created-message'))
    <div class="alert alert-success">{{ session('post-created-message') }}</div>
@elseif(session('post-updated-message'))
    <div class="alert alert-success">{{ session('post-updated-message') }}</div>
@endif

    <h1>{{__('locale.Manage Services')}}</h1>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">{{__('locale.Create Service')}}</a>
    <table class="table">
        <thead>
            <tr>
                <th>{{__('locale.Title')}}</th>
                <th>{{__('locale.Description')}}</th>
                <th>{{__('locale.Image')}}</th>
                <th>{{__('locale.Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection