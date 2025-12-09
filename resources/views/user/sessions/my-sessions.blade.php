@extends('user.layouts.app')

@section('title', 'My Sessions')

@section('header-title', 'My Active Sessions')
@section('header-subtitle', 'Manage and monitor your active sessions across all devices')

@section('content')
    <div class="space-y-6">
        <!-- Security Alert -->
        @if ($activeSessions->count() > 1)
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <div class="flex gap-3">
                    <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-amber-900">Multiple Active Sessions</h3>
                        <p class="text-sm text-amber-700 mt-1">You have {{ $activeSessions->count() }} active session(s). For security, review and terminate unused sessions.</p>
                        @if ($activeSessions->count() > 1)
                            <form action="{{ route('user.sessions.terminateOthers') }}" method="POST" class="mt-3"
                                onsubmit="return confirm('Terminate all other sessions? You will remain logged in on this device.');">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-amber-600 hover:bg-amber-700 text-white text-sm rounded font-medium">
                                    Terminate Other Sessions
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <!-- Sessions Cards -->
        <div class="space-y-4">
            @forelse($activeSessions as $session)
                <div
                    class="bg-white rounded-lg border @if ($session->id == $currentSessionId) border-green-400 bg-green-50 @else border-gray-200 hover:border-gray-300 @endif transition-all p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <!-- Device Header -->
                            <div class="flex items-center gap-3 mb-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $session->browser ?? 'Unknown Browser' }} on
                                        {{ $session->platform ?? 'Unknown Platform' }}
                                    </h3>
                                    <p class="text-sm text-gray-600">{{ $session->ip_address }}</p>
                                </div>

                                @if ($session->id == $currentSessionId)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-200 text-green-900">
                                        ✓ Current Device
                                    </span>
                                @endif
                            </div>

                            <!-- Session Details Grid -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-4 border-t border-gray-200"
                                @if ($session->id == $currentSessionId)
                                border-green-200
                                @endif>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Login Time</p>
                                    <p class="text-sm font-semibold text-gray-900 mt-1">
                                        {{ $session->login_at->format('M d, H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ $session->login_at->format('Y') }}</p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Last Activity</p>
                                    <p class="text-sm font-semibold text-gray-900 mt-1">
                                        {{ $session->last_activity_at->diffForHumans() }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Duration</p>
                                    <p class="text-sm font-semibold text-gray-900 mt-1">
                                        {{ $session->last_activity_at->diffInMinutes($session->login_at) }} min
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Status</p>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-1">
                                        Active
                                    </span>
                                </div>
                            </div>

                            <!-- User Agent Info -->
                            <div class="mt-4 pt-4 border-t @if ($session->id == $currentSessionId) border-green-200 @else border-gray-200 @endif">
                                <p class="text-xs text-gray-500 uppercase tracking-wide mb-2">Browser Details</p>
                                <p class="text-xs text-gray-600 break-all font-mono">{{ $session->user_agent }}</p>
                            </div>
                        </div>

                        <!-- Actions -->
                        @if ($session->id != $currentSessionId)
                            <form action="{{ route('user.sessions.terminate', $session->id) }}" method="POST" class="ml-4 flex-shrink-0"
                                onsubmit="return confirm('Terminate this session?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg font-medium transition-colors">
                                    Terminate
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="bg-white rounded-lg border border-gray-200 p-12 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-gray-500 text-lg font-medium">No active sessions</p>
                    <p class="text-gray-400 text-sm mt-1">Session information will appear here once you're logged in</p>
                </div>
            @endforelse
        </div>

        <!-- Session Security Tips -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h3 class="font-semibold text-blue-900 flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd" />
                </svg>
                Session Security Tips
            </h3>
            <ul class="mt-3 space-y-2 text-sm text-blue-800">
                <li class="flex gap-2">
                    <span class="text-blue-600 font-bold">•</span>
                    <span>Regularly check your active sessions to spot unauthorized access</span>
                </li>
                <li class="flex gap-2">
                    <span class="text-blue-600 font-bold">•</span>
                    <span>Terminate sessions on devices you no longer use</span>
                </li>
                <li class="flex gap-2">
                    <span class="text-blue-600 font-bold">•</span>
                    <span>If you don't recognize a device, terminate it immediately</span>
                </li>
                <li class="flex gap-2">
                    <span class="text-blue-600 font-bold">•</span>
                    <span>Use "Terminate Other Sessions" when logging in from a new device</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
