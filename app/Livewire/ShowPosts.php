<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Personal;

class ShowPosts extends Component
{
    public $count = 0, $list;
    public $message;
    public $search = '', $pers;

    function mount(){
        $list = $this->list;
        $pers = Personal::all();
        $this->pers = $pers;
        $this->message;
    }

    public function increment()
    {
        $this->count++;
    }
    public function eventlist(){
       //$this->list;
    }

    public function render()
    {
        return view('livewire.show-posts');
    }
 //,[   'pers' => Personal::search($this->search)->get(),   ]
}
