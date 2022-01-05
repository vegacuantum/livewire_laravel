<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $search;
    public $short = 'id';
    public $direction = 'desc';

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
}
