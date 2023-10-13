<?php

namespace Modules\User\Http\Controllers;

use Core\Resource\BaseResource;
use Core\Service\ServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;

/**
 * @property \Modules\User\Service $service
 */
class ResourceController extends Controller
{
    public function __construct(protected ServiceInterface $service) {}

    public function index(): ResourceCollection
    {
        return BaseResource::collection($this->service->getRepository()->all());
    }

    public function store(Request $request): Response
    {
        $this->service->create($request->validated());

        return \response(); // TODO
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
