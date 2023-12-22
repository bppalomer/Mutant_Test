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

            fetch("{{ route('viewUserInfo') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    contentContainer.innerHTML = data.content;
                    contentContainer.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error fetching user info content:', error);
                });
        }

        async function showUpdateForm(button) {
            const userId = button.getAttribute('data-user-id');
            const url = `{{ route('admin.updateUser', ['userId' => 0]) }}`.replace('0', userId);
            console.log('Fetching URL:', url);

            try {
                var contentContainer = document.getElementById('contentContainer');
                contentContainer.innerHTML = await fetch(url).then(response => response.text());
                contentContainer.classList.remove('hidden');
            } catch (error) {
                console.error('Error fetching content:', error);
            }
        }
    </script>
</x-app-layout>