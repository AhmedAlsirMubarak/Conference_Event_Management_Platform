@extends('user.layouts.app')

@section('title', $submission->contact_person . ' | Sponsor Submissions')

@section('header-title', 'Sponsor submission Details')
@section('header-subtitle', 'Your submitted Sponsor enquiry')

@section('content')
    <div class="max-w-4xl">
        <!-- Back Button -->
        <a href="{{ route('user.sponsor-submissions.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Sponsor Submissions
        </a>

        <!-- Submission Card -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-8 text-white">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center font-bold text-2xl">
                        {{ strtoupper(substr($submission->contact_person, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold">{{ $submission->contact_person }}</h2>
                        @if ($submission->job_title)
                            <p class="text-orange-100 mt-1">{{ $submission->job_title }}</p>
                        @endif
                        <p class="text-orange-100 text-sm mt-2">Submitted {{ $submission->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <!-- Exhibit Information -->
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
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Website</label>
                            <a href="{{ $submission->website }}" target="_blank" rel="noopener noreferrer"
                                class="text-lg text-blue-600 hover:text-blue-800 font-medium mt-2 block break-all">
                                {{ $submission->website ?? 'Not provided' }}
                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Submitted On</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $submission->created_at->format('F d, Y \a\t g:i A') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sponsor enquiry Details Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Enquiry Details</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        @if ($submission->additional_comments)
                            <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">
                                {{ $submission->additional_comments }}</p>
                        @else
                            <p class="text-gray-500 italic">No details provided</p>
                        @endif
                    </div>
                </div>

                <!-- Admin Notes Section -->
                @if ($submission->admin_notes)
                    <div class="mt-10 pt-8 border-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Admin Notes</h3>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                            <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">
                                {{ $submission->admin_notes }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

