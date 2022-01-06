<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
     //editar el post
    public $search, $post;
    public $short = 'id';
    public $direction = 'desc';

    public $open_edit = false;

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required'
    ];


    protected $listeners =['crearPost'=> 'render'];

    public function render()
    {
        $posts = Post::where('title', 'like', '%'. $this->search . '%')
                    ->orwhere('content', 'like', '%'. $this->search . '%')
                    ->orderby($this->short, $this->direction)
                    ->get();

        return view('livewire.show-posts', compact('posts'));
    }

    public function order($short){
        if ($this->short == $short) {
            
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->short = $short;
            $this->direction = 'asc';
        }       
    }

    public function edit(Post $post){
        $this -> post = $post;
        $this -> open_edit = true;
    }

    public function update(){

        $this->validate();

        $this->post->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'El post se actualizó correctamente');
     }
}
