<x-admin-layout>
        <section class="antialiased bg-gray-100 text-gray-600 w-full px-4 h-full py-5">
            <div class="flex flex-col justify-center">
                <!-- Table -->
                <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="flex justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            <i class="fas fa-users mr-2"></i>
                            Permission
                        </h2>
                        <a href="{{ route('adminpermission.create') }}"  class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md text-white">Create Permission</a>
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
                                            <div class="font-semibold text-left">Permission Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right px-5">Action</div>
                                        </th>
                                    
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach ( $permissions as $key=>$permission)
                                        
                                   
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                         <div class="text-center">{{ $key+1 }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $permission->name }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex justify-end">
                                                <div class="space-x-2 flex">
                                                    <a href="{{ route('adminpermission.edit',$permission->id) }}" class="px-4 py-1 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                                    <form action="{{ route('adminpermission.destroy',$permission->id) }}" method="POST" onsubmit="return confirm('Are you Sure to Delete ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-4 py-1 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
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
