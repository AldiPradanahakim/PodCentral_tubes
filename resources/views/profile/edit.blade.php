{{-- <x-layout>
    <x-sidebar>
        <div class="flex-1 overflow-y-auto p-6 bg-gray-800">

            <div class="max-w-2xl mx-auto bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold text-white mb-6">Edit Profile</h2>

                 @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                 @endif
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                         <label for="nama" class="block text-white text-sm font-medium mb-2">Name:</label>
                        <input type="text" name="nama" id="nama" class="w-full p-2 rounded-md bg-gray-600 text-white border-gray-700 focus:ring focus:ring-blue-500" value="{{ $user->nama }}" required>
                        @error('nama')
                          <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                   <div class="mb-4">
                       <label for="email" class="block text-white text-sm font-medium mb-2">Email:</label>
                       <input type="email" name="email" id="email" class="w-full p-2 rounded-md bg-gray-600 text-white border-gray-700 focus:ring focus:ring-blue-500" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-white text-sm font-medium mb-2">Password:</label>
                        <input type="password" name="password" id="password" class="w-full p-2 rounded-md bg-gray-600 text-white border-gray-700 focus:ring focus:ring-blue-500">
                        @error('password')
                           <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-white text-sm font-medium mb-2">Confirm Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 rounded-md bg-gray-600 text-white border-gray-700 focus:ring focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                         <label for="profile_image" class="block text-white text-sm font-medium mb-2">Profile Image:</label>
                         <input type="file" name="profile_image" id="profile_image" class="w-full p-2 rounded-md bg-gray-600 text-white border-gray-700 focus:ring focus:ring-blue-500" accept="image/*">
                         @error('profile_image')
                             <span class="text-red-500 text-sm">{{$message}}</span>
                           @enderror
                     </div>
                    <div class="mb-4 flex justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                            Save Changes
                        </button>
                         @if($user->profile_image)
                             <form action="{{ route('profile.delete-picture') }}" method="post">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Delete Picture</button>
                            </form>
                         @endif
                      </div>
                </form>

            </div>
        </div>
    </x-sidebar>
</x-layout> --}}