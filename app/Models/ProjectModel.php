<?php


namespace App\Models;


class ProjectModel extends BaseModel
{

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'status'
    ];
}
