<?php

namespace App\Exports;

use App\Operation;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class OperationsExport implements FromQuery, WithHeadings, WithStrictNullComparison
{
    public function __construct($login)
    {
        $this->login = $login;
    }

}
