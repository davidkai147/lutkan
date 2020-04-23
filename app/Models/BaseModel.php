<?php


namespace App\Models;


use App\Traits\HasModify;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasModify;

    protected $appends = [
        'latest_at',
    ];

    public function getLatestAtAttribute()
    {
        return $this->created_at >= $this->updated_at ? $this->created_at : $this->updated_at;
    }
}
