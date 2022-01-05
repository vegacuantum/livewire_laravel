<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        crear post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Creando un nuevo post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value='Titulo de Post' />
                <x-jet-input type="text" class="w-full" wire:model.defer="title" />
                <!-- {{$title}} -->
            </div>

            <div class="mb-4">
                <x-jet-label value='Contenido del post' />
                <textarea wire:model.defer="content" name="" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" rows="6"></textarea>
                <!-- {{$content}} -->
            </div>
        </x-slot>

        <x-slot name="footer">
           <x-jet-secondary-button wire:click="$set('open',false)" class="mr-2">
               Cancelar
           </x-jet-secondary-button>

           <x-jet-danger-button wire:click="save">
               Crear Post
           </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>