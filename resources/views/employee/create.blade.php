<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="post" action="{{ route('employee.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Employee Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="position" :value="__('Position')" />
                            <x-select-option id="position" class="block mt-1 w-full" name="position" :value="old('position')">
                                <option selected disabled>Choose Position</option>
                                <option value="manager">Manager</option>
                                <option value="staff">Staff</option>
                                <option value="admin">Admin</option>
                            </x-select-option>
                            <x-input-error :messages="$errors->get('position')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="salary" :value="__('Salary')" />
                            <x-text-input id="salary" name="salary" type="number" class="mt-1 block w-full" :value="old('salary')" min="0" />
                            <x-input-error class="mt-2" :messages="$errors->get('salary')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="department_id" :value="__('Department')" />
                            <x-select-option id="department_id" class="block mt-1 w-full" name="department_id" :value="old('department_id')">
                                <option selected disabled>Choose Department</option>
                                @forelse ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @empty
                                    <option disabled class="text-red-500">Department does not exist</option>
                                @endforelse
                            </x-select-option>
                            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
