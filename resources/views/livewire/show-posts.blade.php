<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">

   <div class="px-6 py-4 flex items-center">
      <x-jet-input wire:model="search" type="text" class="flex-1 mr-4" placeholder="escriba que busca"></x-jet-input>

      @livewire('create-post')
   </div>

   @if ($posts->count() )
   <x-table>
      <table class="min-w-full divide-y divide-gray-200">
         <thead class="bg-gray-50">
            <tr>
               <th scope="col" wire:click="order('id')" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  ID
               </th>
               <th scope="col" wire:click="order('title')" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Titulo
               </th>
               <th scope="col" wire:click="order('content')" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Contenido
               </th>

               <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
               </th>
            </tr>
         </thead>
         <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($posts as $post )
            <tr>
               <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">{{$post->id}}</div>
               <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">{{$post->title}}</div>
               </td>
               <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">{{$post->content}}</div>
               </td>

               <td class="px-6 py-4  text-sm font-medium">
                  <!-- @livewire('edit-post', ['post' => $post], key($post->id)) 
               -->
                  <x-jet-button wire:click="edit({{$post}})">
                     editar
                  </x-jet-button>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </x-table>

   @else
   <div class="px-6 py-4">
      <h1>No existe ningún post con este nombre</h1>
   </div>

   @endif

   <x-jet-dialog-modal wire:model="open_edit">
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
       <x-jet-secondary-button wire:click="$set('open_edit',false)" class="mr-2">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.remove>
                Editar Post
            </x-jet-danger-button>

            <span wire:loading>cargando ...</span>
       </x-slot>
   </x-jet-dialog-model>

</div>