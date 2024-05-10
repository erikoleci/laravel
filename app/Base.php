<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Base
{
    //
    public function __toString()
    {
        return json_encode($this,JSON_PRETTY_PRINT);
    }
}
