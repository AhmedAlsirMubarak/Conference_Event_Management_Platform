@extends('user.layouts.app')

@section('title', $submission->contact_person . ' | Speaker Submissions')

@section('header-title', 'Speaker Submission Details')
@section('header-subtitle', 'View your speaker submission information')

@section('content')
    <div class="max-w-4xl">
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Back Button -->
        <a href="{{ route('user.speaker-submissions.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to My Submissions
        </a>

        <!-- Submission Card -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-8 text-white">
                <div class="flex items-start justify-between">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center font-bold text-2xl">
                            {{ strtoupper(substr($submission->contact_person, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold">{{ $submission->contact_person }}</h2>
                            @if ($submission->job_title)
                                <p class="text-purple-100 mt-1">{{ $submission->job_title }}</p>
                            @endif
                            <p class="text-purple-100 text-sm mt-2">Submitted {{ $submission->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <!-- Speaker Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Email</label>
                            <a href="mailto:{{ $submission->email_address }}"
                                class="text-lg text-blue-600 hover:text-blue-800 font-medium mt-2 block">
                                {{ $submission->email_address }}
                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Phone</label>
                            <a href="tel:{{ $submission->phone_number }}"
                                class="text-lg text-gray-900 font-medium mt-2 block">
                                {{ $submission->phone_number }}
                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Job Title</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $submission->job_title ?? 'Not provided' }}
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Organization</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $submission->organization_name ?? 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Country</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $submission->country ?? 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Submitted On</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $submission->created_at->format('F d, Y \a\t g:i A') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Speaker Biography Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Speaker Profile / Biography</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        @if ($submission->speaker_biography)
                            <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">
                                {{ $submission->speaker_biography }}</p>
                        @else
                            <p class="text-gray-500 italic">No biography provided</p>
                        @endif
                    </div>
                </div>

                <!-- Notes Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Submission Notes</h3>
                    <form action="{{ route('user.speaker-submissions.updateNotes', $submission->id) }}" method="POST"
                        class="space-y-4">
                        @csrf
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Add or update notes about your submission
                            </label>
                            <textarea id="notes" name="notes" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"
                                placeholder="Add any additional notes or updates about your submission...">{{ $submission->notes }}</textarea>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Save Notes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Status Badge -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Submission Status</h3>
                    <div class="flex items-center gap-3">
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-800 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Submitted Successfully
                        </span>
                        <p class="text-sm text-gray-600">
                            Our team will review your submission and contact you soon.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection