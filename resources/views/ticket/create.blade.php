<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="py-4 text-lg font-bold"> Create new Ticket</h1>
        <div class="w-full sm-max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" name="title" :value="old('title')"   autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div> 
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea id="description" aria-placeholder="Add Description" name="description" :value="old('description')" autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
         
                <div class="mt-4"> 
                     <x-input-label for="attachment" value="Attachments(if any)" />
                     <x-file-input id="attachment" name="attachment" />
                     <x-input-error class="mt-2" :messages="$errors->get('attachment')" autocomplete="attachment"/>
                </div>
         
        
                <div class="flex items-center justify-end mt-4"> 
                    <x-primary-button class="ms-3">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div> 
</x-app-layout>
