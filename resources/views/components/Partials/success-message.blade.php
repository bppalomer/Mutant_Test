<div id="successMessage" class="mt-4 p-2 bg-green-500 text-white text-center">
    {{ $slot }}
</div>

<script>
    // Add a JavaScript function to hide the success message after 2 seconds
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 1000);
</script>