@extends('admin.layouts.app')

@section('title', 'Edit Sponsor | Admin')

@section('header-title', 'Edit Sponsor')
@section('header-subtitle', 'Update sponsor information')

@section('content')
    <div class="w-full">
        <a href="{{ route('sponsors.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Sponsors
        </a>

        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <form action="{{ route('sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-3 gap-6">
                @csrf
                @method('PUT')

                <!-- Left: Logo Upload -->
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                    @if ($sponsor->logo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/uploads/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}"
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
                <div class="col-span-2 space-y-4">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Sponsor Name *</label>
                        <input type="text" name="name" id="name" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="Enter sponsor name" value="{{ old('name', $sponsor->name) }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Website Field -->
                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                        <input type="url" name="website" id="website"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="https://example.com" value="{{ old('website', $sponsor->website) }}">
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category Field -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <input type="text" name="category" id="category"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="e.g., Technology, Hospitality" value="{{ old('category', $sponsor->category) }}">
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                        <button type="submit"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Update
                        </button>
                        <a href="{{ route('sponsors.index') }}"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium text-sm transition-colors">
                            Cancel
                        </a>
                    </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
