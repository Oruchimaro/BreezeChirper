<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialLoginComponent extends Component
{
    public function __construct(public string $provider)
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.social-login-component');
    }
}
