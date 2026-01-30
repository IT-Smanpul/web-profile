<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

abstract class Controller
{
    protected string $appName;

    public function __construct()
    {
        $this->appName = Config::get('app.name', 'Laravel Application');
    }

    protected function setTitle(string $title): string
    {
        return "$title - $this->appName";
    }
}
