<?php

namespace Modules\User\Controllers;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\User\Requests\CreateRequest;
use Core\Controller\BaseController;
use Core\Service\ServiceInterface;
use Modules\User\Entities\User;
use Core\Resource\BaseResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

/**
 * @property \Modules\User\Service $service
 */
class ResourceController extends BaseController
{
    public function __construct(protected ServiceInterface $service) {}

    public function index(): ResourceCollection
    {
        return BaseResource::collection($this->service->getRepository()->all());
    }

    public function store(CreateRequest $request): Response
    {
        $this->service->create($request->validated());

        return ;
    }

    public function show(User $user): Response
    {
        return new BaseResource($user);
    }

    public function update(Request $request, string $id): Response
    {
        $this->service->update($id);

        return \response(); // TODO
    }

    public function destroy(string $id): Response
    {
        $this->service->delete($id);

        return \response(); // TODO
    }
}
