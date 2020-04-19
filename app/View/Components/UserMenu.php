<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserMenu extends Component
{
    public $permission;

    /**
     * Create a new component instance.
     *
     * @param $permission
     */
    public function __construct($permission)
    {
        $this->permission = $permission;
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
