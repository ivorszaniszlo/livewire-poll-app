<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];
    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $poll = Poll::create([
            'title' => $this->title
        ]);

        foreach ($this->options as $option) {
            if (is_array($option)) {
                if (isset($option['name']) && is_string($option['name'])) {
                    $poll->options()->create(['name' => $option['name']]);
                } else {
                    throw new \TypeError("Option array must contain a string 'name' key.");
                }
            } elseif (is_string($option)) {
                $poll->options()->create(['name' => $option]);
            } else {
                throw new \TypeError("Option name must be a string or an array containing a 'name' key, " . gettype($option) . " given.");
            }
        }

        $this->reset(['title', 'options']);
    }

    // public function mount()
    // {
        
    // }
}
