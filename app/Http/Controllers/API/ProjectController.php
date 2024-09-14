<?php

namespace App\Http\Controllers\API;

use App\Models\Project;
use App\Services\ProjectService;
use App\Http\Resources\ProjectResource;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Project\projectRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends BaseController
{
    /**
     * __construct
     *
     * @param  mixed $service
     * @return void
     */
    public function __construct(protected ProjectService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :AnonymousResourceCollection
    {
        return ProjectResource::collection($this->service->all($request));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(projectRequest $request) :ProjectResource
    {
        $data = $request->validated();
        $project = $this->service->create($data);
        if(isset($data['users'])){
            $project->users()->attach($data['users']);
        }
        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project) :ProjectResource
    {
        return new ProjectResource($project->load('users','timesheets'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(projectRequest $request, Project $project) :ProjectResource
    {
        $data = $request->validated();
        $this->service->update($project,$data);
        if (isset($data['users'])) {
            $project->users()->sync($data['users']);
        }
        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!$this->service->delete($project)) {
            return $this->sendError('delete error');
        }
        return response()->json('deleted successfully', 200);
    }
}
