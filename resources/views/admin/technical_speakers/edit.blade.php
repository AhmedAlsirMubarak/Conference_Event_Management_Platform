@extends('admin.layouts.app')

@section('title', 'Edit ' . $speaker->name . ' | Admin')

@section('header-title', 'Edit Speaker')
@section('header-subtitle', 'Update speaker information')

@section('content')
    <div class="max-w-lg">
        <a href="{{ route('technical_speakers.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Speakers
        </a>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="grid grid-cols-3 gap-6 p-6 border-b border-gray-200">
                <div>
                    @if ($speaker->logo)
                        <img src="{{ asset('images/' . $speaker->logo) }}" alt="Logo" class="h-24 w-24 object-contain">
                    @else
                        <div class="h-24 w-24 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="col-span-2 space-y-2">
                    <h2 class="text-2xl font-bold text-gray-900">{{ $speaker->name }}</h2>
                    @if ($speaker->title)
                        <p class="text-gray-600">{{ $speaker->title }}</p>
                    @endif
                    @if ($speaker->company)
                        <p class="text-gray-500 text-sm">{{ $speaker->company }}</p>
                    @endif
                </div>
            </div>

            <form action="{{ route('technical_speakers.update', $speaker->id) }}" method="POST"
                enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Speaker Name *</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $speaker->name }}">
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $speaker->title }}">
                    @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                    <input type="text" name="company" id="company"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $speaker->company }}">
                    @error('company')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition-colors cursor-pointer"
                        onclick="document.getElementById('logo').click()">
                        <svg class="w-8 h-8 text-gray-400 mx-auto mb-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-sm text-gray-600">Click to upload logo</p>
                    </div>
                    <input type="file" name="logo" id="logo" accept="image/*" class="hidden">
                    @error('logo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition-colors cursor-pointer"
                        onclick="document.getElementById('photo').click()">
                        <svg class="w-8 h-8 text-gray-400 mx-auto mb-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-sm text-gray-600">Click to upload photo</p>
                    </div>
                    <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
                    @error('photo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                    <textarea name="bio" id="bio" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Speaker biography">{{ $speaker->bio }}</textarea>
                    @error('bio')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update
                    </button>
                    <a href="{{ route('technical_speakers.index') }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
