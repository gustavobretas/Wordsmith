{{-- Main Content --}}
<div class="px-8 py-5 relative">
    <div class="max-w-4xl">
        <div class="flex justify-between items-start">
            <h1 class="font-bold text-gray-800">Settings</h1>
            <div wire:click="newSetting"
                class="px-4 py-2 cursor-pointer uppercase text-xs font-bold bg-green-500 text-white rounded shadow">New Setting</div>
        </div>
        <div class="flex flex-col min-w-full leading-normal shadow rounded-lg overflow-hidden mt-6">
            <div class="cursor-pointer bg-white hover:bg-yellow-50 flex">
                <div
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-2/6">
                    Key</div>
                <div
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-3/6">
                    Value</div>
                <div
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/6"></div>
            </div>
            @foreach ($settings as $index => $setting)
                <div class="cursor-pointer bg-white hover:bg-yellow-50 flex justify-between">
                    <div class="px-5 py-5 text-sm w-2/6">
                        <div class="flex flex-col">
                            <input type="text" wire:model.lazy="settings.{{ $index }}.key" placeholder="Setting Key"
                                class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" />
                        </div>
                    </div>
                    <div class="px-5 py-5 text-sm w-3/6">
                        <div class="flex flex-col">
                            <input type="text" wire:model.lazy="settings.{{ $index }}.value" placeholder="Setting Value"
                                class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" />
                        </div>
                    </div>
                    <div class="px-5 py-5 text-sm w-1/6">
                        <div class="flex flex-col items-center justify-center">
                            <div wire:click="delete('{{ $index }}')"
                                class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg cursor-pointer hover:bg-red-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
