<div>

    <form id="addProductForm" action="{{ route('submitFormToAddProducts') }}" method="post" class="max-w-md mx-auto mt-8 bg-white dark:bg-gray-800 rounded-md p-6">
        @csrf
        <div class="mb-4">
            <label for="productName" class="block text-sm font-medium text-gray-700">Product Name:</label>
            <input type="text" id="productName" name="productName" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300">
        </div>
        <div class="mb-4">
            <label for="productPrice" class="block text-sm font-medium text-gray-700">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" step="0.01" min="0" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300">
        </div>
        <div class="mb-4">
            <label for="productDescription" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea id="productDescription" name="productDescription" rows="4" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300"></textarea>
        </div>

        <div class="flex items-center justify-center">
            <button id="submitBtn" class="bg-[#1a2e05] hover:bg-[#f0f9ff] text-white hover:text-[#1a2e05] w-full md:w-96 font-bold py-2 px-4 rounded" type="submit">Submit</button>
        </div>
    </form>

    @if(session('success'))
    <div class="mt-4 p-2 bg-green-500 text-white text-center">
        {{ session('success') }}
    </div>
    @endif

</div>