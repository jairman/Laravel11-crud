<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students List') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('alerts')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">


                <div class="mb-4 mt-2 ml-2 flex justify-between items-center">
                    <a href="{{ route('students.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Student</a>

                </div>



                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="w-1/4 px-4 py-2">ID</th>
                            <th class="w-1/2 px-4 py-2">Name</th>
                            <th class="w-1/4 px-4 py-2">Age</th>
                            <th class="w-1/2 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="border px-4 py-2">{{ $student->id }}</td>
                                <td class="border px-4 py-2">{{ $student->name }}</td>
                                <td class="border px-4 py-2">{{ $student->age }}</td>
                                <td class="border px-4 py-2 text-center">

                                    <div class="flex gap-3">


                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                            Edit
                                        </a>


                                        <button type="button" onclick="confirmDelete('{{ $student->id }}')"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {



        alertify.confirm('Delete Student', 'Are you sure you want to delete this student?', function() {

            let form = document.createElement('form');

            form.method = "POST";
            form.action = `/students/${id}`;
            form.innerHTML = '@csrf @method('DELETE')'
            document.body.appendChild(form);

            form.submit();

            //alertify.success('Ok')
        }, function() {
            //alertify.error('Cancel')
            return true;
        });

    }
</script>
