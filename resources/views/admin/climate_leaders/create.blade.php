@extends('admin.layouts.app')

@section('title', 'Create Climate Leader | Admin Dashboard')

@section('header-title', 'Create Climate Leader')
@section('header-subtitle', 'Add a new climate leader to the network')

@section('content')
    <div class="max-w-4xl">
        <!-- Back Button -->
        <a href="{{ route('climate-leaders.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Climate Leaders
        </a>

        <!-- Form Card -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-linear-to-r from-green-500 to-green-600 px-6 py-8 text-white">
                <h2 class="text-3xl font-bold">Add New Climate Leader</h2>
                <p class="text-green-100 mt-2">Fill in the information below to add a new climate leader</p>
            </div>

            <!-- Form Content -->
            <form action="{{ route('climate-leaders.store') }}" method="POST" class="p-8">
                @csrf

                <!-- Personal Information Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6 pb-4 border-b border-gray-200">Personal Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="md:col-span-2">
                            <label for="fullname" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                            <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('fullname') border-red-500 @enderror"
                                placeholder="e.g., John Smith" required>
                            @error('fullname')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                placeholder="john@example.com" required>
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                                placeholder="+1 (555) 123-4567" required>
                            @error('phone')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Organization -->
                        <div>
                            <label for="organization" class="block text-sm font-medium text-gray-700 mb-2">Organization
                                *</label>
                            <input type="text" id="organization" name="organization" value="{{ old('organization') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('organization') border-red-500 @enderror"
                                placeholder="e.g., Environmental NGO" required>
                            @error('organization')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Location Information Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6 pb-4 border-b border-gray-200">Location Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Country of Nationality -->
                        <div>
                            <label for="Country_of_Nationality" class="block text-sm font-medium text-gray-700 mb-2">Country
                                of Nationality *</label>
                            <input type="text" id="Country_of_Nationality" name="Country_of_Nationality"
                                value="{{ old('Country_of_Nationality') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('Country_of_Nationality') border-red-500 @enderror"
                                placeholder="e.g., United States" required>
                            @error('Country_of_Nationality')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Country of Residence -->
                        <div>
                            <label for="Country_of_Residence" class="block text-sm font-medium text-gray-700 mb-2">Country
                                of Residence *</label>
                            <input type="text" id="Country_of_Residence" name="Country_of_Residence"
                                value="{{ old('Country_of_Residence') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('Country_of_Residence') border-red-500 @enderror"
                                placeholder="e.g., United Kingdom" required>
                            @error('Country_of_Residence')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6 pb-4 border-b border-gray-200">Additional
                        Information</h3>

                    <div class="space-y-6">
                        <!-- Biography -->
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Biography *</label>
                            <textarea id="bio" name="bio" rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('bio') border-red-500 @enderror"
                                placeholder="Write a brief biography about the climate leader..."
                                required>{{ old('bio') }}</textarea>
                            <p class="text-xs text-gray-500 mt-2">Max 1000 characters</p>
                            @error('bio')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- LinkedIn Profile -->
                        <div>
                            <label for="linkedin_profile" class="block text-sm font-medium text-gray-700 mb-2">LinkedIn
                                Profile URL</label>
                            <input type="url" id="linkedin_profile" name="linkedin_profile"
                                value="{{ old('linkedin_profile') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('linkedin_profile') border-red-500 @enderror"
                                placeholder="https://linkedin.com/in/username">
                            @error('linkedin_profile')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center gap-3 pt-8 border-t border-gray-200">
                    <button type="submit"
                        class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                        Create Climate Leader
                    </button>
                    <a href="{{ route('climate-leaders.index') }}"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection