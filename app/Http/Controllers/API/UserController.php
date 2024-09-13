<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends BaseController
{
    /**
     * __construct
     *
     * @param  mixed $service
     * @return void
     */
    public function __construct(protected UserService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index() :AnonymousResourceCollection
    {
        return UserResource::collection($this->service->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request) :UserResource
    {
        $data = $request->validated();
        $user = $this->service->create($data);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) :UserResource
    {
        return new UserResource($user->load('projects','timesheets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user) :UserResource
    {
        $data = $request->validated();
         $this->service->update($user,$data);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if (!$this->service->delete($user)) {
            return $this->sendError('delete error');
        }

        return response()->json('deleted successfully', 200);
    }
}
