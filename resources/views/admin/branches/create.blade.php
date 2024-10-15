@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Create Contact Us')

@section('content')
    <div class="container mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="card shadow-lg p-4 rounded-3 border-0">
                    <h2 class="text-center mb-4 text-primary">{{__('locale.Manage Branch Information')}}</h2>

                    <form action="{{ route('branches.store') }}" method="POST">
                        @csrf

                        <!-- Branch Name -->
                        <div class="mb-4" >
                            <label for="name" class="form-label fw-bold">{{__('locale.Branch Name')}}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="fas fa-building"></i></span>
                                <input type="text" id="name" name="name" class="form-control shadow-sm rounded"
                                    placeholder="{{__('locale.Enter branch name')}}" required>
                            </div>
                        </div>

                        <!-- Branch Address -->
                        <div class="mb-4">
                            <label for="address" class="form-label fw-bold">{{__('locale.Branch Address')}}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i
                                        class="fas fa-map-marker-alt"></i></span>
                                <input type="text" id="address" name="address" class="form-control shadow-sm rounded"
                                    placeholder="{{__('locale.Enter branch address')}}" required>
                            </div>
                        </div>

                        <!-- Phone Numbers Section -->
                        <div id="phones-section" class="mb-4">
                            <label class="form-label fw-bold">{{__('locale.Phone Numbers')}}</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-primary text-white"><i class="fas fa-phone"></i></span>
                                <input type="text" name="phones[]" class="form-control shadow-sm rounded"
                                    placeholder="{{__('locale.Enter phone number')}}" required>
                                <button type="button" class="btn btn-outline-primary ms-2 add-phone">{{__('locale.Add Phone')}}</button>
                            </div>
                        </div>

                        <!-- Email Addresses Section -->
                        <div id="emails-section" class="mb-4">
                            <label class="form-label fw-bold">{{__('locale.Email Addresses')}}</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-primary text-white"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="emails[]" class="form-control shadow-sm rounded"
                                    placeholder="{{__('locale.Enter email address')}}" required>
                                <button type="button" class="btn btn-outline-primary ms-2 add-email">{{__('locale.Add Email')}}</button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success shadow-sm px-4 py-2 rounded-pill">{{__('locale.Save Branch')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- page scripts --}}
@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add Phone Field
            document.querySelector('.add-phone').addEventListener('click', function() {
                const phoneField = document.createElement('div');
                phoneField.classList.add('input-group', 'mb-2');
                phoneField.innerHTML = `
            <span class="input-group-text bg-primary text-white"><i class="fas fa-phone"></i></span>
            <input type="text" name="phones[]" class="form-control shadow-sm rounded" placeholder="{{__('locale.Enter phone number')}}" required>
            <button type="button" class="btn btn-outline-danger ms-2 remove-phone">{{__('locale.Remove')}}</button>
        `;
                document.getElementById('phones-section').appendChild(phoneField);

                // Add event listener to the remove button
                phoneField.querySelector('.remove-phone').addEventListener('click', function() {
                    phoneField.remove();
                });
            });

            // Add Email Field
            document.querySelector('.add-email').addEventListener('click', function() {
                const emailField = document.createElement('div');
                emailField.classList.add('input-group', 'mb-2');
                emailField.innerHTML = `
            <span class="input-group-text bg-primary text-white"><i class="fas fa-envelope"></i></span>
            <input type="email" name="emails[]" class="form-control shadow-sm rounded" placeholder="{{__('locale.Enter email address')}}" required>
            <button type="button" class="btn btn-outline-danger ms-2 remove-email">{{__('locale.Remove')}}</button>
        `;
                document.getElementById('emails-section').appendChild(emailField);

                // Add event listener to the remove button
                emailField.querySelector('.remove-email').addEventListener('click', function() {
                    emailField.remove();
                });
            });
        });
    </script>
@endsection
