<x-layout>
   <x-navbar></x-navbar>
    <div class="flex min-h-screen flex-col justify-center items-center bg-gray-900 p-6">
        <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-lg">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img class="h-12" src="{{ asset('img/podcast.png') }}" alt="Spotify Logo">
            </div>
            
    
            <!-- Login Header -->
            <h2 class="text-3xl font-semibold text-center text-white mb-6">Log in to PodCentral</h2>
    
            <!-- Social Login Buttons -->
            <div class="space-y-4">
                <!-- Google Button -->
                <button class="w-full flex justify-center items-center bg-white text-gray-900 py-2 px-4 rounded-lg shadow-sm hover:bg-gray-200">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google.png" class="w-5 h-5 mr-3" alt="Google Logo">
                    Continue with Google
                </button>
                
                <!-- Facebook Button -->
                <button class="w-full flex justify-center items-center bg-blue-600 text-white py-2 px-4 rounded-lg shadow-sm hover:bg-blue-500">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" class="w-5 h-5 mr-3" alt="Facebook Logo">
                    Continue with Facebook
                </button>

            </div>
    
            <!-- Email and Password Fields -->
            <div class="mt-8 space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email or username</label>
                    <input type="email" id="email" name="email" required class="block w-full mt-2 p-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" id="password" name="password" required class="block w-full mt-2 p-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <!-- Submit Button -->
                <button type="submit" class="w-full mt-4 py-2 px-4 bg-green-600 text-white rounded-lg shadow-sm hover:bg-green-500 focus:outline-none">Log In</button>
            </div>
    
            <!-- Forgot Password and Sign Up Links -->
            <div class="mt-6 text-center">
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Lupa Password?</a>
            </div>
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-500">Tidak punya akun? <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Daftar ke PodCentral</a></p>
            </div>
        </div>
    </div>
    
    
</x-layout>