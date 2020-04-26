<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserMenu extends Component
{
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.user-menu');
    }
}
