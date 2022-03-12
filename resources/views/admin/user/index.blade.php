<x-admin-layout>
    <section class="antialiased bg-gray-100 text-gray-600 w-full px-4 h-full py-5">
        <div class="flex flex-col justify-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="flex justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            <i class="fas fa-users mr-2"></i>
                            User
                        </h2>
                        <a href="{{ route('adminrole.create') }}"
                            class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md text-white">Create User</a>
                    </div>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Sl</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Email</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-right">Action</div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">{{ $key + 1 }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $user->name }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $user->email }}</div>

                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex justify-end">
                                                <div class=" flex space-x-2">
                                                    <a href="{{ route('adminuser.show', $user->id) }}"
                                                        class="px-4 py-1 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Role</a>

                                                    <form action="{{ route('adminuser.destroy', $user->id) }}"
                                                        method="Post"
                                                        onsubmit="return confirm('Are you Sure to Delete');">
                                                        <button type="submit"
                                                            class="px-4 py-1 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
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
    </section>
</x-admin-layout>
