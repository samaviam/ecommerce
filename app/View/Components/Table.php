<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     * @var array
     */
    public $header;

    /**
     * @var array
     */
    public $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $rows)
    {
        $this->header = $header;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.table');
    }
}
