@extends('admin.layouts.app')

@section('title', 'My Sessions')

@section('header-title', 'My Active Sessions')
@section('header-subtitle', 'Manage and monitor your active sessions')

@section('content')
    @if ($activeSessions->count() > 1)
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd" />
                </svg>
                <div>
                    <h3 class="font-semibold text-blue-900">Multiple Active Sessions</h3>
                    <p class="text-sm text-blue-700 mt-1">You have {{ $activeSessions->count() }} active session(s). For security, consider terminating unused sessions.</p>
                    @if ($activeSessions->count() > 1)
                        <form action="{{ route('sessions.terminateOthers') }}" method="POST" class="mt-3"
                            onsubmit="return confirm('Terminate all other sessions?');">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded font-medium">
                                Terminate Others
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="space-y-4">
        @forelse($activeSessions as $session)
            <div
                class="bg-white rounded-lg border border-gray-200 p-6 @if ($session->id == $currentSessionId) border-blue-400 bg-blue-50 @endif">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $session->browser ?? 'Unknown Browser' }} on {{ $session->platform ?? 'Unknown Platform' }}
                            </h3>
                            @if ($session->id == $currentSessionId)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Current Session
                                </span>
                            @endif
                            @if ($session->is_suspicious)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Suspicious Activity
                                </span>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                            <div>
                                <p class="text-xs text-gray-500 uppercase">IP Address</p>
                                <p class="text-sm font-medium text-gray-900 mt-1">{{ $session->ip_address }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase">Login Time</p>
                                <p class="text-sm font-medium text-gray-900 mt-1">{{ $session->login_at->format('M d, Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase">Last Activity</p>
                                <p class="text-sm font-medium text-gray-900 mt-1">{{ $session->last_activity_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase">Duration</p>
                                <p class="text-sm font-medium text-gray-900 mt-1">
                                    {{ $session->last_activity_at->diffInMinutes($session->login_at) }} minutes
                                </p>
                            </div>
                        </div>
                    </div>

                    @if ($session->id != $currentSessionId)
                        <form action="{{ route('sessions.terminate', $session->id) }}" method="POST" class="ml-4"
                            onsubmit="return confirm('Terminate this session?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded font-medium transition-colors">
                                Terminate
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg border border-gray-200 p-12 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <p class="text-gray-500 text-lg">No active sessions found</p>
            </div>
        @endforelse
    </div>
@endsection
