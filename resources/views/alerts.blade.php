
@if (session()->has('success'))

    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success alert!</span>  {{ session('success') }}
      </div>
@endif

