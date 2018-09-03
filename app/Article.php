<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\HasImage;

class Article extends Model
{
    use HasImage;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'unique_id';
    }
}
