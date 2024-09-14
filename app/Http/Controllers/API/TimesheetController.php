<?php

namespace App\Http\Controllers\API;

use App\Models\Timesheet;
use App\Services\TimesheetService;
use App\Http\Resources\TimesheetResource;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\timesheet\TimesheetRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TimesheetController extends BaseController
{

    /**
     * __construct
     *
     * @param  mixed $service
     * @return void
     */
    public function __construct(protected TimesheetService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * index
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request) :AnonymousResourceCollection
    {
        return TimesheetResource::collection($this->service->all($request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimesheetRequest $request) : TimesheetResource
    {
        $data = $request->validated();
        $timesheet = $this->service->create($data);
        return new TimesheetResource($timesheet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Timesheet $timesheet) :TimesheetResource
    {
        return new TimesheetResource($timesheet->load('project','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimesheetRequest $request, Timesheet $timesheet):TimesheetResource
    {
        $data = $request->validated();
        $this->service->update($timesheet,$data);
        return new TimesheetResource($timesheet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timesheet $timesheet)
    {
        if (!$this->service->delete($timesheet)) {
            return $this->sendError('delete error');
        }
        return response()->json('deleted successfully', 200);
    }
}
