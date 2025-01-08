<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-gray-900">
        <div class="col-lg-4 mx-auto w-full max-w-md bg-gray-800 rounded-lg shadow-xl p-8">
            <div class="sm:mx-auto sm:w-full">
                <img class="m-auto h-12" src="{{ asset('img/podcast.png') }}" alt="Podcast Logo">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-white">Mendaftar untuk <br>mulai mendengarkan</h2>
            </div>
    
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <form action="/register" method="POST">
                    @csrf
                    <!-- Name field -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-white">Nama</label>
                        <div class="mt-2 @error('nama') border-red-500 @enderror">
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" autofocus autocomplete="off" class="block w-full rounded-md bg-white px-4 py-3 text-base text-black outline-none shadow-sm focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('nama') 
                        <div class="mt-2 text-sm text-red-600">{{ $message }}</div> 
                        @enderror
                    </div>
    
                    <!-- Email field -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-white">Email</label>
                        <div class="mt-2 @error('email') border-red-500 @enderror">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="off" class="block w-full rounded-md bg-white px-4 py-3 text-base text-black outline-none shadow-sm focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('email') 
                        <div class="mt-2 text-sm text-red-600">{{ $message }}</div> 
                        @enderror
                    </div>
    
                    <!-- Password field -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-white">Kata Sandi</label>
                        <div class="mt-2 @error('password') border-red-500 @enderror">
                            <input type="password" name="password" id="password" required autocomplete="off" class="block w-full rounded-md bg-white px-4 py-3 text-base text-black outline-none shadow-sm focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('password') 
                        <div class="mt-2 text-sm text-red-600">{{ $message }}</div> 
                        @enderror
                    </div>
    
                    <!-- Confirm Password field -->
                    <div class="mb-6" @error('password_confirmation') border-red-500 @enderror>
                        <label for="password_confirmation" class="block text-sm font-medium text-white">Konfirmasi Kata Sandi</label>
                        <div class="mt-2">
                            <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="off" class="block w-full rounded-md bg-white px-4 py-3 text-base text-black outline-none shadow-sm focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        @error('password_confirmation') 
                        <div class="mt-2 text-sm text-red-600">{{ $message }}</div> 
                        @enderror
                    </div>
    
                    <!-- Submit button -->
                    <div>
                        <button type="submit" class="w-full flex justify-center rounded-md bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-2 focus:outline-indigo-600">
                            Mendaftar
                        </button>
                    </div>
                </form>
    
                <!-- OR Section -->
                <div class="flex items-center justify-between mt-6">
                    <hr class="w-full border-gray-400">
                    <span class="text-sm text-gray-500 mx-4">OR</span>
                    <hr class="w-full border-gray-400">
                </div>
    
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
    
                <p class="mt-8 text-center text-sm text-gray-500">
                    Sudah menjadi anggota?
                    <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
    
    
</x-layout>