@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Create Contact Us')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="card shadow-lg p-4 rounded-3 border-0">
                    <h2 class="text-center mb-4 text-primary">{{__('locale.Edit Branch Information')}}</h2>

                    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Branch Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">{{__('locale.Branch Name')}}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="fas fa-building"></i></span>
                                <input type="text" id="name" name="name" class="form-control shadow-sm rounded"
                                    value="{{ $branch->name }}" required>
                            </div>
                        </div>

                        <!-- Branch Address -->
                        <div class="mb-4">
                            <label for="address" class="form-label fw-bold">{{__('locale.Branch Address')}}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i
                                        class="fas fa-map-marker-alt"></i></span>
                                <input type="text" id="address" name="address" class="form-control shadow-sm rounded"
                                    value="{{ $branch->address }}" required>
                            </div>
                        </div>

                        <!-- Phone Numbers Section -->
                        <div id="phones-section" class="mb-4">
                            <label class="form-label fw-bold">{{__('locale.Phone Numbers')}}</label>
                            @foreach ($branch->phones as $phone)
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-primary text-white"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="phones[]" class="form-control shadow-sm rounded"
                                        value="{{ $phone->phone_number }}" required>
                                    <button type="button" class="btn btn-outline-danger ms-2 remove-phone">{{__('locale.Remove')}}</button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Add Phone Button -->
                        <button type="button" class="btn btn-outline-primary mb-4 add-phone">{{__('locale.Add Phone')}}</button>

                        <!-- Email Addresses Section -->
                        <div id="emails-section" class="mb-4">
                            <label class="form-label fw-bold">{{__('locale.Email Addresses')}}</label>
                            @foreach ($branch->emails as $email)
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-primary text-white"><i
                                            class="fas fa-envelope"></i></span>
                                    <input type="email" name="emails[]" class="form-control shadow-sm rounded"
                                        value="{{ $email->email_address }}" required>
                                    <button type="button" class="btn btn-outline-danger ms-2 remove-email">{{__('locale.Remove')}}</button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Add Email Button -->
                        <button type="button" class="btn btn-outline-primary mb-4 add-email">{{__('locale.Add Email')}}</button>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success shadow-sm px-4 py-2 rounded-pill">{{__('locale.Update Branch')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add Phone Field
            document.querySelector('.add-phone').addEventListener('click', function() {
                const phoneField = document.createElement('div');
                phoneField.classList.add('input-group', 'mb-2');
                phoneField.innerHTML = `
            <span class="input-group-text bg-primary text-white"><i class="fas fa-phone"></i></span>
            <input type="text" name="phones[]" class="form-control shadow-sm rounded" placeholder="Enter phone number" required>
            <button type="button" class="btn btn-outline-danger ms-2 remove-phone">{{__('locale.Remove')}}</button>
        `;
                document.getElementById('phones-section').appendChild(phoneField);

                // Remove Phone
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
            <input type="email" name="emails[]" class="form-control shadow-sm rounded" placeholder="Enter email address" required>
            <button type="button" class="btn btn-outline-danger ms-2 remove-email">{{__('locale.Remove')}}</button>
        `;
                document.getElementById('emails-section').appendChild(emailField);

                // Remove Email
                emailField.querySelector('.remove-email').addEventListener('click', function() {
                    emailField.remove();
                });
            });
        });
    </script>
@endsection
