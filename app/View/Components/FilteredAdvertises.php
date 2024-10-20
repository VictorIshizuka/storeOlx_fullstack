<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredAdvertises extends Component
{
    /**
     * Create a new component instance.
     */

    public $advertisesList;
    public function __construct()
    {
        $this->advertisesList = [
            [
                'href' => "#",
                'bgImage' => "http://placehold.it/150x150",
                'title' => "Controle PS4 - Preto",
                'price' => "275,00"
            ],
            [
                'href' => "#",
                'bgImage' => "http://placehold.it/150x150",
                'title' => "Controle PS4 - Preto",
                'price' => "275,00"
            ],
            [
                'href' => "#",
                'bgImage' => "http://placehold.it/150x150",
                'title' => "Controle PS4 - Preto",
                'price' => "275,00"
            ],
            [
                'href' => "#",
                'bgImage' => "http://placehold.it/150x150",
                'title' => "Controle PS4 - Preto",
                'price' => "275,00"
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filtered-advertises');
    }
}
