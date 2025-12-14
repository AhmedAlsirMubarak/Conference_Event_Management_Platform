@extends('admin.layouts.app')

@section('title', 'Edit Exhibitor | Admin')

@section('header-title', 'Edit Exhibitor')
@section('header-subtitle', 'Update exhibitor information')

@section('content')
    <div class="w-full">
        <a href="{{ route('exhibitors.index') }}"
            class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 mb-4 sm:mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium text-sm sm:text-base transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="hidden sm:inline">Back to Exhibitors</span>
            <span class="sm:hidden">Back</span>
        </a>

        <div class="bg-white rounded-lg border border-gray-200 p-4 sm:p-6">
            <form action="{{ route('exhibitors.update', $exhibitor->id) }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @csrf
                @method('PUT')

                <!-- Left: Logo Upload -->
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                    @if ($exhibitor->logo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $exhibitor->logo) }}" alt="{{ $exhibitor->name }}"
                                class="h-32 rounded-lg object-contain w-full">
                            <p class="text-xs text-gray-500 mt-2">Current logo</p>
                        </div>
                    @endif
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition-colors cursor-pointer"
                        onclick="document.getElementById('logo').click()">
                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-600 font-medium text-sm">Click to upload</p>
                        <p class="text-gray-500 text-xs">PNG, JPG</p>
                    </div>
                    <input type="file" name="logo" id="logo" accept="image/*" class="hidden">
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Right: Form Fields -->
                <div class="sm:col-span-2 space-y-4">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Exhibitor Name *</label>
                        <input type="text" name="name" id="name" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="Enter exhibitor name" value="{{ old('name', $exhibitor->name) }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Website Field -->
                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                        <input type="url" name="website" id="website"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="https://example.com" value="{{ old('website', $exhibitor->website) }}">
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row items-center gap-3 pt-4 border-t border-gray-200">
                        <button type="submit"
                            class="w-full sm:flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Update
                        </button>
                        <a href="{{ route('exhibitors.index') }}"
                            class="w-full sm:flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium text-sm transition-colors">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection