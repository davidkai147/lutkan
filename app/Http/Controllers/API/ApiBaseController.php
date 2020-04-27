<?php

namespace App\Http\Controllers\API;

use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\JWT;

class ApiBaseController extends Controller
{
    /**
     * @var null
     */
    protected $perPage = null;

    /**
     * @var null
     */
    protected $orderBy = null;

    /**
     * @var null
     */
    protected $direction = null;

    /**
     * @var null
     */
    protected $user = null;

    /**
     * @var null
     */
    protected $type = null;

    /**
     * @var null
     */
    protected $created_by = null;
    /**
     * @var string
     */
    protected $constants;

    use HttpResponse;

    public function __construct(Request $request)
    {
        $this->perPage = $request->get('perPage');
        $this->orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'created_at';
        $this->direction = $request->get('direction') ? $request->get('direction') : 'desc';
        $this->constants =  AppConstants::class;
    }

    protected function setIdentifier(JWT $jwt, $token = null)
    {
        if ($token) {
            $type = $jwt->decode($token);
        }

        if (isset($type['tpe']) && $type['tpe']) {
            $this->type = $type['tpe'];

            $this->user = optional(auth($this->type)->user());

            $this->created_by = $this->user->id;

            return true;
        }

        return false;
    }
}
