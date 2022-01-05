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

               <td class="px-6 py-4 text-right text-sm font-medium">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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

</div>

