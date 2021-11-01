<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * @var array
     */
    public $previousPages;

    /**
     * @var string
     */
    public $pageName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($previousPages, $pageName)
    {
        $this->previousPages = $previousPages;
        $this->pageName = $pageName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
