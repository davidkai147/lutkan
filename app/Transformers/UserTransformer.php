<?php


namespace App\Transformers;


use App\Models\User;
use Flugg\Responder\Transformers\Transformer;

class UserTransformer extends Transformer
{
    protected $load = [];

    public function transform(User $user)
    {
        return $user->toArray();
    }
}
