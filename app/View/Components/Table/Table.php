<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Table extends Component
{

    public array $headers;
    public $textSize;

    protected $availableSizes = [
        'text-xs', 
        'text-xs md:text-sm',
        'text-sm md:text-base',
        'text-lg md:text-xl'
    ];
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $headers, $headSize='')
    {
        $this->headers = $headers;
        if(!in_array($headSize, $this->availableSizes))
        {
            $this->textSize = 'text-sm md:text-base';
        } else {
            $this->textSize = $headSize;
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.table');
    }
}
