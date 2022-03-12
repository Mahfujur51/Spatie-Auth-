<x-admin-layout>
    <section class="antialiased bg-gray-100 text-gray-600 w-full px-4 h-full py-5">
        <div class="flex flex-col justify-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="flex justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            <i class="fas fa-users mr-2"></i>
                            Edit Permission
                        </h2>
                        <a href="{{ route('adminpermission.index') }}"
                            class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md text-white">back</a>
                    </div>
                </header>
                <div class="p-3">
                    <form action="{{ route('adminpermission.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Permission
                                            Name </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">

                                            <input type="text" id="name" name="name"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                value="{{ $permission->name }}" />
                                        </div>
                                        @error('name')
                                            <span class="text-red-400 text-sm"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Update
                                    Permission</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-6 p-2">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="flex justify-between">
                            <h2 class="text-lg font-medium text-gray-900">
                                <i class="fas fa-users mr-2"></i>
                                Role Permission
                            </h2>

                        </div>
                    </header>
                    <div class="mt-4 p-2 flex space-x-2">
                        @if ($permission->roles->count() > 0)
                            @foreach ($permission->roles as $permission_role)
                                <form
                                    action="{{ route('adminpermissionrole.destroy', [$permission->id, $permission_role->id]) }}"
                                    method="POST" onsubmit="return confirm('Are you Sure to Delete ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-1 bg-red-500 hover:bg-red-700 text-white rounded-md">{{ $permission_role->name }}</button>
                                </form>
                            @endforeach
                        @else
                            <p class="text-center text-red-500">This role has no permission</p>
                        @endif
                    </div>

                    <div class="p-3">
                        <form action="{{ route('adminpermissions.roles', $permission->id) }}" method="POST">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="role" name="role" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign
                            Permission</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</x-admin-layout>
