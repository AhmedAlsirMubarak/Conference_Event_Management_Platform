@extends('admin.layouts.app')

@section('title', $climateLeader->fullname . ' | Climate Leaders')

@section('header-title', 'Climate Leader Details')
@section('header-subtitle', 'View and manage leader information')

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <!-- Back Button -->
        <a href="{{ route('climate-leaders.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Climate Leaders
        </a>

        <!-- Leader Card -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-linear-to-r from-green-500 to-green-600 px-6 py-8 text-white">
                <div class="flex items-start justify-between">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center font-bold text-2xl">
                            {{ strtoupper(substr($climateLeader->fullname, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold">{{ $climateLeader->fullname }}</h2>
                            <p class="text-green-100 mt-1">{{ $climateLeader->organization }}</p>
                            <p class="text-green-100 text-sm mt-2">Joined {{ $climateLeader->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <a href="{{ route('climate-leaders.edit', $climateLeader->id) }}"
                            class="inline-flex items-center gap-2 px-3 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-colors text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('climate-leaders.destroy', $climateLeader->id) }}" method="POST"
                            class="inline" class="inline"
                            onsubmit="return confirm('Are you sure you want to delete this leader?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-3 py-2 bg-red-500 hover:bg-red-600 rounded-lg transition-colors text-sm font-medium text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <!-- Leader Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Email</label>
                            <a href="mailto:{{ $climateLeader->email }}"
                                class="text-lg text-blue-600 hover:text-blue-800 font-medium mt-2 block break-all">
                                {{ $climateLeader->email }}
                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Phone</label>
                            <a href="tel:{{ $climateLeader->phone }}" class="text-lg text-gray-900 font-medium mt-2 block">
                                {{ $climateLeader->phone }}
                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Country of
                                Nationality</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $climateLeader->Country_of_Nationality }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Country of
                                Residence</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $climateLeader->Country_of_Residence }}
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Organization</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $climateLeader->organization }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">LinkedIn
                                Profile</label>
                            @if ($climateLeader->linkedin_profile)
                                <a href="{{ $climateLeader->linkedin_profile }}" target="_blank"
                                    class="text-lg text-blue-600 hover:text-blue-800 font-medium mt-2 block break-all">
                                    View Profile
                                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m-4-6l6-6m0 0l-6 6m6-6v6" />
                                    </svg>
                                </a>
                            @else
                                <p class="text-lg text-gray-900 font-medium mt-2">Not provided</p>
                            @endif
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Joined On</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                {{ $climateLeader->created_at->format('F d, Y \a\t g:i A') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bio Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Biography</h3>
                    <div class="bg-gray-50 rounded-lg p-6 text-gray-700 leading-relaxed whitespace-pre-wrap">
                        {{ $climateLeader->bio }}
                    </div>
                </div>

                <!-- Notes Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Admin Notes</h3>
                        <button type="button"
                            onclick="openNoteModal({{ $climateLeader->id }}, '{{ addslashes($climateLeader->notes ?? '') }}')"
                            class="inline-flex items-center gap-2 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Note
                        </button>
                    </div>
                    @if ($climateLeader->notes)
                        <div class="bg-gray-50 rounded-lg p-6 text-gray-700 leading-relaxed whitespace-pre-wrap">
                            {{ $climateLeader->notes }}
                        </div>
                        @if ($climateLeader->last_reviewed_at)
                            <p class="text-xs text-gray-500 mt-3">Last reviewed
                                {{ $climateLeader->last_reviewed_at->diffForHumans() }}</p>
                        @endif
                    @else
                        <p class="text-gray-500 italic">No notes added yet.</p>
                    @endif
                </div>

                <!-- Last Updated -->
                <div class="mt-6 pt-6 border-t border-gray-200 text-sm text-gray-500">
                    Last updated {{ $climateLeader->updated_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Notes Modal -->
    <div id="noteModal" class="fixed inset-0 bg-black/50 items-center justify-center z-50 p-4" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Add/Edit Note</h3>

            <form action="" id="noteForm" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="noteText" class="block text-sm font-medium text-gray-700 mb-2">Note</label>
                    <textarea id="noteText" name="notes" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Add notes about this climate leader..."></textarea>
                    <p class="text-xs text-gray-500 mt-1">Max 1000 characters</p>
                </div>

                <div class="flex gap-3 justify-end">
                    <button type="button" onclick="closeNoteModal()"
                        class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition-colors">
                        Save Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openNoteModal(leaderId, noteText) {
            const form = document.getElementById('noteForm');
            form.action = `/climate-leaders/${leaderId}/notes`;
            document.getElementById('noteText').value = noteText;
            document.getElementById('noteModal').style.display = 'flex';
        }

        function closeNoteModal() {
            document.getElementById('noteModal').style.display = 'none';
            document.getElementById('noteText').value = '';
        }

        // Close modal when clicking outside
        document.getElementById('noteModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeNoteModal();
            }
        });
    </script>
@endsection
