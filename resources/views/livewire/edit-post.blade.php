<div>
    <a>
   <x-jet-button wire:click="$set('open', true)">
       editar
    </x-jet-button>
 

   <x-jet-dialog-modal wire:model="open">
       <x-slot name='title'>
        Editar post 
       </x-slot>

       <x-slot name='content'>
           <div class="mb-4">
           <x-jet-label value="Editar titulo" />
           <x-jet-input wire:model.defer="post.title" class="w-full" type="text"/>
           </div>

           <div class="mb-4">
               <x-jet-label value="Editar contenido"/>
               <textarea wire:model.defer="post.content" rows="6" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"></textarea>

           </div>
           
       </x-slot>

       <x-slot name='footer'>
       <x-jet-secondary-button wire:click="$set('open',false)" class="mr-2">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.remove>
                Editar Post
            </x-jet-danger-button>

            <span wire:loading>cargando ...</span>
       </x-slot>
   </x-jet-dialog-model>
   

</div>