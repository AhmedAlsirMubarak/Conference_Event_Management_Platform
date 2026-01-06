@extends('admin.layouts.app')

@section('title', 'Session Details')

@section('header-title', 'Session Details')
@section('header-subtitle', 'View detailed information about this session')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Status Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <p class="text-gray-600 text-sm font-medium">Status</p>
            <div class="mt-4">
                @if ($session->is_active)
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                        Inactive
                    </span>
                @endif

                @if ($session->is_suspicious)
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 ml-2">
                        Suspicious
                    </span>
                @endif
            </div>
        </div>

        <!-- Duration Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <p class="text-gray-600 text-sm font-medium">Duration</p>
            <p class="text-3xl font-bold text-blue-600 mt-2">
                {{ $session->last_activity_at->diffInMinutes($session->login_at) }}
                <span class="text-lg text-gray-600">minutes</span>
            </p>
        </div>

        <!-- Device ID Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <p class="text-gray-600 text-sm font-medium">Device ID</p>
            <p class="text-xs font-mono text-gray-700 mt-2 break-all">{{ $session->device_id }}</p>
        </div>
    </div>

    <!-- Session Information -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- User Information -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">User Information</h3>
            <dl class="space-y-4">
                <div>
                    <dt class="text-xs text-gray-500 uppercase">Name</dt>
                    <dd class="text-sm font-medium text-gray-900 mt-1">{{ $session->user->name }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500 uppercase">Email</dt>
                    <dd class="text-sm font-medium text-gray-900 mt-1">{{ $session->user->email }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500 uppercase">Role</dt>
                    <dd class="text-sm font-medium text-gray-900 mt-1 capitalize">{{ $session->user->role }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500 uppercase">User ID</dt>
                    <dd class="text-sm font-medium text-gray-900 mt-1">{{ $session->user->id }}</dd>
                </div>
            </dl>
        </div>

        <!-- Browser & Device Information -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Device Information</h3>
            <dl class="space-y-4">
                <div>
                    <dt class="text-xs text-gray-500 uppercase">Browser</dt>
                    <dd class="text-sm font-medium text-gray-900 mt-1">{{ $session->browser ?? 'Unknown' }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500 uppercase">Platform</dt>
                    <dd class="text-sm font-medium text-gray-900 mt-1">{{ $session->platform ?? 'Unknown' }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500 uppercase">IP Address</dt>
                    <dd class="text-sm font-medium text-gray-900 mt-1">{{ $session->ip_address }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500 uppercase">User Agent</dt>
                    <dd class="text-xs text-gray-700 mt-1 break-all">{{ $session->user_agent }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Session Timeline -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Session Timeline</h3>
        <div class="space-y-4">
            <div class="flex gap-4">
                <div class="flex flex-col items-center">
                    <div class="w-4 h-4 rounded-full bg-green-500 mt-1.5"></div>
                    <div class="w-0.5 h-12 bg-gray-300"></div>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Session Started</p>
                    <p class="text-sm text-gray-500">{{ $session->login_at->format('M d, Y \a\t H:i:s') }}</p>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="flex flex-col items-center">
                    <div class="w-4 h-4 rounded-full bg-blue-500 mt-1.5"></div>
                    @if (!$session->logout_at)
                        <div class="w-0.5 h-12 bg-gray-300"></div>
                    @endif
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Last Activity</p>
                    <p class="text-sm text-gray-500">{{ $session->last_activity_at->format('M d, Y \a\t H:i:s') }}</p>
                </div>
            </div>

            @if ($session->logout_at)
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-4 h-4 rounded-full bg-red-500 mt-1.5"></div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Session Ended</p>
                        <p class="text-sm text-gray-500">{{ $session->logout_at->format('M d, Y \a\t H:i:s') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-6 flex gap-3">
        <a href="{{ route('sessions.index') }}"
            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-medium transition-colors">
            Back to Sessions
        </a>
        @if ($session->is_active)
            <form action="{{ route('sessions.terminate', $session->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Terminate this session?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Terminate Session
                </button>
            </form>
        @endif
    </div>
@endsection
