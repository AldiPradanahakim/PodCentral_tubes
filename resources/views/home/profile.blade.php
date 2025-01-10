<x-layout>
    <div class="container mx-auto px-4 py-8 text-white">
        <div class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-6">Profile</h1>
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-medium">Welcome, {{ $user->nama }}</p>
                        <p class="text-gray-400">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="pt-6">
                    <a 
                        href="{{ route('home.index') }}" 
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-150"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>