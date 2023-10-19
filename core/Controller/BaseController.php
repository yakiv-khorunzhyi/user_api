<?php

namespace Core\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Pagination\Paginator;
use App\Transformers\ToArrayTransformer;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ResponseException;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    protected function createdResponse($data = [], ?string $location = null): Response
    {
        if (empty($data)) {
            return $this->response->created($location, null);
        }

        return $this->createResponse($data)
                    ->setStatusCode(201)
                    ->header('Location', $location);
    }

    /**
     * @param Collection|Paginator|Model|array $data
     *
     * @return \Illuminate\Http\Response
     * @throws \App\Exceptions\ResponseException
     */
    protected function successResponse($data = []): Response
    {
        return $this->createResponse($data);
    }

    protected function successResponseWithoutData(?string $location = null): Response
    {
        $response = response('', $location ? 302 : 200);

        if ($location !== null) {
            $response->header('Location', $location);
        }

        return $response;
    }

    protected function noContentResponse(): Response
    {
        return $this->response->noContent();
    }

    private function createResponse($data): \Dingo\Api\Http\Response
    {
        if ($data instanceof Collection) {
            return $this->response->collection($data, ToArrayTransformer::class);
        }

        if ($data instanceof Paginator) {
            return $this->response->paginator($data, ToArrayTransformer::class);
        }

        if (is_array($data)) {
            return $this->response->array(['data' => $data]);
        }

        if ($data instanceof Model) {
            return $this->response->array(['data' => $data->toArray()]);
        }

        throw new ResponseException('Unknown response.' . gettype($data));
    }
}
