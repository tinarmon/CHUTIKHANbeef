<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class AwardsShowcase extends Component
{
    public int $active = 0;

    private function slides(): array
    {
        return array_values(config('portfolio.awards.slides', []));
    }

    public function next(): void
    {
        $count = count($this->slides());
        if ($count > 0) {
            $this->active = ($this->active + 1) % $count;
        }
    }

    public function prev(): void
    {
        $count = count($this->slides());
        if ($count > 0) {
            $this->active = ($this->active - 1 + $count) % $count;
        }
    }

    public function select(int $index): void
    {
        $count = count($this->slides());
        if ($count > 0) {
            $this->active = (($index % $count) + $count) % $count;
        }
    }

    public function render(): View
    {
        return view('livewire.awards-showcase', ['slides' => $this->slides()]);
    }
}
