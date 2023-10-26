<?php

namespace App\Http\Controllers\Services;

interface Newsletter{
    public function subscribe(string $email,string $list = null);
}
