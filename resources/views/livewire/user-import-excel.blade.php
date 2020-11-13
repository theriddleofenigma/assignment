<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users - Excel Import') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-xl">
                        <x-label for="excel_upload" :value="__('Upload Excel')"/>
                        <x-input wire:model="file" class="block mt-1 w-full" type="file" name="excel_upload"/>
                        @error('file')
                        <p class="text-sm font-semibold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <x-button class="mt-3" wire:click="import">
                        {{ __('Import') }}
                    </x-button>

                    <div class="mt-4">
                        <div wire:loading wire:target="file" class="mt-4 font-bold animate-pulse text-blue-600">Uploading..!</div>
                        <div wire:loading wire:target="import" class="mt-4 font-bold animate-pulse text-blue-600">Processing..!</div>
                        @if($message)
                            <div>{{ $message }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
