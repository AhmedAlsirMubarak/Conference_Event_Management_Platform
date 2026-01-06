@extends('user.layouts.app')

@section('title', $contact->Name . ' | Contacts')

@section('header-title', 'Contact Details')
@section('header-subtitle', 'View submitted contact information')

@section('content')
    <div class="max-w-4xl">
        <!-- Back Button -->
        <a href="{{ route('user.contacts.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Contacts
        </a>

        <!-- Contact Card -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-linear-to-r from-green-500 to-green-600 px-6 py-8 text-white">
                <div class="flex items-start justify-between">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center font-bold text-2xl">
                            {{ strtoupper(substr($contact->Name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold">{{ $contact->Name }}</h2>
                            @if ($contact->Designation)
                                <p class="text-green-100 mt-1">{{ $contact->Designation }}</p>
                            @endif
                            <p class="text-green-100 text-sm mt-2">Submitted {{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <button type="button" onclick="replyContact('{{ $contact->Email }}')"
                            class="inline-flex items-center gap-2 px-3 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-colors text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Reply
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Email</label>
                            <a href="mailto:{{ $contact->Email }}"
                                class="text-lg text-green-600 hover:text-green-800 font-medium mt-2 block">
                                {{ $contact->Email }}
                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Phone</label>
                            <a href="tel:{{ $contact->Phone }}" class="text-lg text-gray-900 font-medium mt-2 block">
                                {{ $contact->Phone }}
                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Designation</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $contact->Designation ?? 'Not provided' }}
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Company</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $contact->Company ?? 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Website</label>
                            @if ($contact->Website)
                                <a href="{{ $contact->Website }}" target="_blank"
                                    class="text-lg text-green-600 hover:text-green-800 font-medium mt-2 block break-all">
                                    {{ $contact->Website }}
                                </a>
                            @else
                                <p class="text-lg text-gray-900 font-medium mt-2">Not provided</p>
                            @endif
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Submitted On</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $contact->created_at->format('F d, Y \a\t g:i A') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Communication Notes Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Communication Notes</h3>
                        @if ($contact->last_communicated_at)
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Last update: {{ $contact->last_communicated_at->diffForHumans() }}
                            </span>
                        @else
                            <span class="inline-block px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">
                                No communication yet
                            </span>
                        @endif
                    </div>

                    <form action="{{ route('user.contacts.updateNotes', $contact->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Add or update notes about your communication with this contact
                            </label>
                            <textarea name="notes" id="notes" rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="e.g., Called on Dec 8, interested in partnership. Follow-up scheduled for next week.">{{ $contact->notes }}</textarea>
                            <p class="text-xs text-gray-500 mt-2">Max 1000 characters</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Save Notes
                            </button>
                            @if ($contact->notes)
                                <button type="button" onclick="clearNotes()"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Clear Notes
                                </button>
                            @endif
                        </div>

                        @if ($errors->any())
                            <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                                <ul class="list-disc list-inside text-sm text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function replyContact(email) {
            window.location.href = 'mailto:' + email;
        }

        function clearNotes() {
            document.getElementById('notes').value = '';
        }
    </script>
@endsection
