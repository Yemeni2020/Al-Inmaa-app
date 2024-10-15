@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Create role')

@section('content')
<div dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
    <h1>{{__('locale.Create role')}}</h1>
    <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{__('locale.name')}}</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-primary">{{__('locale.Create')}}</button>
    </form>
</div>
@endsection
