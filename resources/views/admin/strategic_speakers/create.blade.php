@extends('admin.layouts.app')

@section('title', 'Add Strategic Speaker | Admin')

@section('header-title', 'Add Speaker')
@section('header-subtitle', 'Create a new strategic speaker')

@section('content')
    <div class="w-full max-w-2xl mx-auto px-0">
        <a href="{{ route('strategic_speakers.index') }}"
            class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 mb-4 sm:mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium text-sm sm:text-base transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="hidden sm:inline">Back to Speakers</span>
            <span class="sm:hidden">Back</span>
        </a>

        <div class="bg-white rounded-lg border border-gray-200 p-4 sm:p-8">
            <form action="{{ route('strategic_speakers.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Speaker Name *</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter speaker name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="e.g., Director, Manager" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company Field -->
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                    <input type="text" name="company" id="company"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Company name" value="{{ old('company') }}">
                    @error('company')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Logo Upload -->
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors cursor-pointer"
                        onclick="document.getElementById('logo').click()">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-600 font-medium">Click to upload logo</p>
                        <p class="text-gray-500 text-sm">PNG, JPG up to 2MB</p>
                    </div>
                    <input type="file" name="logo" id="logo" accept="image/*" class="hidden">
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Upload -->
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors cursor-pointer"
                        onclick="document.getElementById('photo').click()">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-600 font-medium">Click to upload photo</p>
                        <p class="text-gray-500 text-sm">PNG, JPG up to 2MB</p>
                    </div>
                    <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
                    @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bio Field -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                    <textarea name="bio" id="bio" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Speaker biography">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-3 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Create Speaker
                    </button>
                    <a href="{{ route('strategic_speakers.index') }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image preview functionality with separate containers
        function setupImagePreview(inputId, previewContainerId) {
            const input = document.getElementById(inputId);

            input.addEventListener('change', function () {
                if (!this.files || !this.files[0]) return;

                const file = this.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Get the specific preview container
                    const container = document.getElementById(previewContainerId);

                    // Clear previous preview
                    container.innerHTML = `
                                <div class="relative inline-block">
                                    <img src="${e.target.result}" alt="Preview" class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                                    <button type="button" onclick="document.getElementById('${previewContainerId}').innerHTML = ''" class="absolute top-0 right-0 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-gray-600 mt-2">${file.name}</p>
                            `;
                };

                reader.readAsDataURL(file);
            });
        }

        // Create preview containers after each input
        const logoInput = document.getElementById('logo');
        const photoInput = document.getElementById('photo');

        if (logoInput) {
            const logoContainer = document.createElement('div');
            logoContainer.id = 'logo-preview';
            logoContainer.className = 'mt-4';
            logoInput.closest('div').parentElement.appendChild(logoContainer);
        }

        if (photoInput) {
            const photoContainer = document.createElement('div');
            photoContainer.id = 'photo-preview';
            photoContainer.className = 'mt-4';
            photoInput.closest('div').parentElement.appendChild(photoContainer);
        }

        setupImagePreview('logo', 'logo-preview');
        setupImagePreview('photo', 'photo-preview');
    </script>
@endsection
