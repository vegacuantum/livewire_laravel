<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
     public $open = false;

     public $title, $content;

    protected $rules = [
        'title' => 'required',
        'content' => 'required'
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save(){

        $this->validate();
        
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open', 'title', 'content']);

        $this->emitto('show-posts','crearPost');

        $this->emit('alert', 'El post se creo satisfactoriamente');

    }
}
