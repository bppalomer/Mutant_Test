<x-app-layout>
    <!-- ... your existing Blade code ... -->

    <!-- ... your existing Blade code ... -->

<div class="py-12 flex content-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <button onclick="showFormToAddProducts()" class="bg-[#1a2e05] hover:bg-[#f0f9ff] text-white hover:text-[#1a2e05] w-96 font-bold py-2 px-4 rounded">
                    Add Product
                </button>
                <button onclick="showViewUserInfo()" class="bg-[#1a2e05] hover:bg-[#f0f9ff] text-white hover:text-[#1a2e05] w-96 font-bold py-2 px-4 rounded">
                    View User Information
                </button>
            </div>

            <!-- Include the success message component -->
            @include('components.partials.success-message', ['slot' => session('success')])

            <div id="contentContainer" class="hidden p-6 text-gray-900 dark:text-gray-100">
                <!-- Content will be dynamically updated here -->
            </div>
        </div>
    </div>
</div>


    <script>
    async function showFormToAddProducts() {
        var contentContainer = document.getElementById('contentContainer');
        contentContainer.innerHTML = await fetch("{{ route('showFormToAddProducts') }}").then(response => response.text());
        contentContainer.classList.remove('hidden');
    }

    function showViewUserInfo() {
        var contentContainer = document.getElementById('contentContainer');
        contentContainer.innerHTML = "View User Information Section Content";
        contentContainer.classList.remove('hidden');
    }
</script>
</x-app-layout>
