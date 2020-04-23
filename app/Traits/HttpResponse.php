<?php

namespace App\Traits;

use Flugg\Responder\Http\MakesResponses;
use Flugg\Responder\Http\Responses\SuccessResponseBuilder;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Http\JsonResponse;
use League\Fractal\Serializer\JsonApiSerializer;

trait HttpResponse
{
    use MakesResponses;

    /**
     * @var mixed
     */
    protected $serializer = JsonApiSerializer::class;

    protected function getSerializer()
    {
        return $this->serializer;
    }

    protected function setSerializer($serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * @param mixed $data
     * @param callable|string|Transformer|null $transformer
     * @param string|null $resourceKey
     * @return SuccessResponseBuilder|JsonResponse
     */
    public function httpOK($data = null, $transformer = null, string $resourceKey = null)
    {
        return $this->success($data, $transformer, $resourceKey)
            ->serializer($this->getSerializer())
            ->respond(JsonResponse::HTTP_OK);
    }

    /**
     * @param mixed $data
     * @param callable|string|Transformer|null $transformer
     * @param string|null $resourceKey
     * @return SuccessResponseBuilder|JsonResponse
     */
    public function httpCreated($data = null, $transformer = null, string $resourceKey = null)
    {
        return $this->success($data, $transformer, $resourceKey)
            ->serializer($this->getSerializer())
            ->respond(JsonResponse::HTTP_CREATED);
    }

    public function httpNoContent()
    {
        return $this->success()
            ->serializer($this->getSerializer())
            ->respond(JsonResponse::HTTP_NO_CONTENT);
    }

    public function unauthorized($errorCode = 'unauthorized', string $message = null)
    {
        return $this->error($errorCode, $message)->respond(JsonResponse::HTTP_UNAUTHORIZED);
    }

    public function forbidden($errorCode = 'unauthenticated', string $message = null)
    {
        return $this->error($errorCode, $message)->respond(JsonResponse::HTTP_FORBIDDEN);
    }

    public function unprocessable($errorCode = 'validation_failed', string $message = null)
    {
        return $this->error($errorCode, $message)->respond(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
