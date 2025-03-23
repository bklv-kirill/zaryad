<?php

declare(strict_types=1);

namespace App\View\Components\Module;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Loader extends Component
{
    public function __construct()
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.module.loader');
    }
}
