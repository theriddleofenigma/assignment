<div>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users - Excel Import') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-xl" x-data @reset-file-input.window="$refs.file.value = ''">
                        <x-label for="excel_upload" :value="__('Upload Excel')"/>
                        <x-input wire:model="file" x-ref="file" type="file" name="excel_upload"
                                 class="block mt-1 w-full"/>
                        @error('file')
                        <p class="text-sm font-semibold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <x-button class="mt-3" wire:click="import">
                        {{ __('Import') }}
                    </x-button>

                    <div class="mt-4">
                        <div wire:loading wire:target="file" class="mt-4 font-bold animate-pulse text-blue-600">
                            Uploading..!
                        </div>
                        <div wire:loading wire:target="import" class="mt-4 font-bold animate-pulse text-blue-600">
                            Processing..!
                        </div>
                        @if($message)
                            <p class="mt-4 text-{{ $messageColor }}-500">{{ $message }}</p>
                        @endif
                    </div>

                    @if($validationErrors)
                        <p>Error on Row: {{ $validationErrors['row'] }}</p>
                        <div class="mt-3">
                            <p>Attribute: {{ $validationErrors['attribute'] }}</p>
                            <ul class="list-inside text-sm text-red-600">
                                @foreach ($validationErrors['errors'] as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-3">
                            <p>Current values: </p>
                            <ul class="list-inside text-sm text-green-600">
                                @foreach ($validationErrors['values'] as $key => $value)
                                    <li><span
                                            class="font-semibold text-gray-800">{{ ucfirst($key) }}</span> {{ $value }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
