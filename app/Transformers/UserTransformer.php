<?php


namespace App\Transformers;


use App\Models\User;
use Flugg\Responder\Transformers\Transformer;

class UserTransformer extends Transformer
{
    protected $extra;
    public function __construct($extra)
    {
        $this->extra = $extra;
    }

    protected $load = [];

    public function transform(User $user)
    {
        $user->token = $this->extra;
        return $user->toArray();
    }
}
