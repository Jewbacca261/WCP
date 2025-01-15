<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('👋 Welcome, :first_name!', ['first_name' => Auth::user()->name]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="divider">Common Functions</div>

            <div class="grid grid-cols-1 gap-10 px-4 mt-8 sm:grid-cols-4 sm:px-8">
                <a href="{{ route('logs.index') }}">
                    <div class="flex items-center bg-gray-800 border border-slate-800 rounded-md overflow-hidden shadow transform transition duration-300 hover:scale-105">
                        <div class="p-4">
                            <i class="fa-regular fa-user text-lg"></i>
                        </div>
                        <div class="px-4 text-white">
                            <h3 class="text-lg tracking-wider">List Accounts</h3>
                            <p class="text-sm text-gray-400">View the list of accounts on this server.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('websites.index') }}">
                    <div class="flex items-center bg-gray-800 border border-slate-800 rounded-md overflow-hidden shadow transform transition duration-300 hover:scale-105">
                        <div class="p-4">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <div class="px-4 text-white">
                            <h3 class="text-lg tracking-wider">List Websites</h3>
                            <p class="text-sm text-gray-400">View the list of all the websites currently hosted.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('logs.index') }}">
                    <div class="flex items-center bg-gray-800 border border-slate-800 rounded-md overflow-hidden shadow transform transition duration-300 hover:scale-105">
                        <div class="p-4">
                            <i class="fa-regular fa-user text-lg"></i>
                        </div>
                        <div class="px-4 text-white">
                            <h3 class="text-lg tracking-wider">Workers</h3>
                            <p class="text-sm text-gray-400">View and manage workers.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('logs.index') }}">
                    <div class="flex items-center bg-gray-800 border border-slate-800 rounded-md overflow-hidden shadow transform transition duration-300 hover:scale-105">
                        <div class="p-4">
                            <i class="fa-regular fa-user text-lg"></i>
                        </div>
                        <div class="px-4 text-white">
                            <h3 class="text-lg tracking-wider">System Logs</h3>
                            <p class="text-sm text-gray-400">View recorded system logs.</p>
                        </div>
                    </div>
                </div>
            </a>
            <div class="divider">Workers</div>

            @if($workers->isEmpty())
                <div class="max-w-full mx-auto mt-10">
                    <div class="flex items-center text-white p-4 rounded-lg shadow-xl ring-2 ring-red-600 ring-opacity-50 transition-all">
                        <i class="fas fa-exclamation-triangle text-3xl mr-4 text-red-400 glow"></i>
                        <div class="text-lg font-semibold">
                            <p>No workers found. <a class="link">Create</a> one first.</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 sm:px-6 lg:px-8 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($workers as $worker)
                        <div class="bg-gray-800 text-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl relative">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-semibold">{{ $worker->hostname }}</h3>
                                    <span class="ml-2 inline-block text-xs py-1 px-3 rounded-full
                                        @if($worker->status === 'idle') bg-yellow-500 text-black
                                        @elseif($worker->status === 'busy') bg-red-600 text-white
                                        @else bg-gray-500 text-white @endif">
                                        {{ ucfirst($worker->status) }}
                                    </span>
                                </div>

                                <!-- Worker Info -->
                                <div class="space-y-3 text-sm">
                                    <p><span class="font-semibold">Worker ID:</span> {{ $worker->worker_id }}</p>
                                    <p><span class="font-semibold">IP Address:</span> {{ $worker->ip_address }}</p>
                                    <p><span class="font-semibold">Last Heartbeat:</span>
                                        {{ $worker->last_heartbeat ? \Carbon\Carbon::parse($worker->last_heartbeat)->diffForHumans() : 'Never' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif
        </div>
    </div>
</x-app-layout>
