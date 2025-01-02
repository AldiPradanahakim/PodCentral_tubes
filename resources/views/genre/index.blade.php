<x-layout>
    <!-- Genre Selection Section -->
    <section class="container mx-auto p-7" id="genre-selection">
        <div class="title text-3xl font-bold text-center mb-6 text-white">Pilih 3 Genre Favorit Kamu</div>

        <div class="categories grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kategori Seni -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Seni">
                <img src="{{ asset('img/paint-palette.png') }}" alt="Seni" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Seni</span>
            </div>
            <!-- Kategori Komedi -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Komedi">
                <img src="{{ asset('#') }}" alt="Komedi" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Komedi</span>
            </div>
            <!-- Kategori Olahraga -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Olahraga">
                <img src="{{ asset('#') }}" alt="Olahraga" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Olahraga</span>
            </div>
            <!-- Kategori Keluarga -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Keluarga">
                <img src="{{ asset('#') }}" alt="Keluarga" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Keluarga</span>
            </div>
            <!-- Kategori Horor -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Horor">
                <img src="{{ asset('#') }}" alt="Horor" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Horor</span>
            </div>
            <!-- Kategori Teknologi -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Teknologi">
                <img src="{{ asset('#') }}" alt="Teknologi" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Teknologi</span>
            </div>
             <!-- Kategori Teknologi -->
             <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Kejahatan">
                <img src="{{ asset('#') }}" alt="Teknologi" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Kejahatan</span>
            </div>
            <!-- Kategori Teknologi -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Pemerintah">
                <img src="{{ asset('#') }}" alt="Teknologi" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Pemerintah</span>
            </div>     
            <!-- Kategori Teknologi -->
            <div class="category bg-gray-800 rounded-lg shadow-lg p-4 text-center transition-transform duration-300 hover:scale-105 cursor-pointer" data-genre="Sejarah">
                <img src="{{ asset('#') }}" alt="Teknologi" class="w-24 h-24 mx-auto mb-4 transition-transform duration-300 hover:scale-105">
                <span class="text-white font-semibold">Sejarah</span>
            </div>        
        </div>
        
        <div class="text-center mt-6">
            <button id="next-button" class="next-button bg-yellow-500 text-white py-2 px-6 rounded-full hover:bg-yellow-400 transition-colors duration-300 disabled:opacity-50 cursor-pointer" disabled>
                Next
            </button>
        </div>
        
    </section>

    <script>
        // Get all category divs and the Next button
        const categories = document.querySelectorAll('.category');
        const nextButton = document.getElementById('next-button');
        let selectedCategories = [];
    
        // Listen for clicks on the categories
        categories.forEach(category => {
            category.addEventListener('click', () => {
                const genre = category.getAttribute('data-genre');
                
                // If category is already selected, unselect it
                if (selectedCategories.includes(genre)) {
                    category.classList.remove('selected');
                    selectedCategories = selectedCategories.filter(item => item !== genre);
                } else {
                    // If there are less than 3 selections, select the category
                    if (selectedCategories.length < 3) {
                        category.classList.add('selected');
                        selectedCategories.push(genre);
                    }
                }
    
                // Enable or disable the Next button based on the selected categories
                if (selectedCategories.length === 3) {
                    nextButton.disabled = false;
                    nextButton.classList.remove('disabled:opacity-50');
                } else {
                    nextButton.disabled = true;
                    nextButton.classList.add('disabled:opacity-50');
                }
            });
        });
    </script>

    <style>
        .selected {
            background-color: #3a7e19; 
            transform: scale(1.05); 
        }
    </style>

</x-layout>
