<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="py-4 text-lg font-bold"> Update Support Ticket</h1>
        <div class="w-full sm-max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
            <form method="POST" action="{{ route('ticket.update',$ticket->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <input id="title" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="title" value = "{{ $ticket->title }}"/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div> 
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" aria-placeholder="Add Description" name="description" value = "{{ $ticket->description }}"  class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" >{{ $ticket->description }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
         
                <div class="mt-4"> 
                    @if($ticket->attachment)
                        <a href="{{"/storage". '/' .$ticket->attachment }}" target="blank">View Attachment</a>
                    @endif
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
