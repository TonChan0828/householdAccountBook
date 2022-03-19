<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function getMonths()
    {
        $selectYear = \Request->query('selectYear');

        // if(!empty($selectYear)){

        // }

        $query = Book::query()->select('month')->where()->whereNull('deleted_at')->groupBy('month')->orderBy('month', ASC);
    }
}
