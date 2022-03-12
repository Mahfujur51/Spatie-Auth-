<x-admin-layout>
    <section class="antialiased bg-gray-100 text-gray-600 w-full px-4 h-full py-5">
        <div class="flex flex-col justify-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="flex justify-between">
                    <h2 class="text-lg font-medium text-gray-900">
                        <i class="fas fa-users mr-2"></i>
                        Roles
                    </h2>
                    <a href="{{ route('adminrole.index') }}" class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md">back</a>
                </div>
                </header>
                <div class="p-3">
                    <form action="{{ route('adminrole.store') }}" method="POST">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-1 gap-6">
                              <div class="col-span-3 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Role Name </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                               
                                  <input type="text" name="name" id="name" class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Ex: admin">
                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm"> {{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Create Role</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
