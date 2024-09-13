<?php

namespace App\Http\Controllers\API;

use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Http\Controllers\Controller;
use App\Http\Resources\TimesheetResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TimesheetController extends Controller
{

    protected $timesheetService;

    public function __construct(BaseService $baseService)
    {
        $this->timesheetService = new $baseService(new Timesheet());
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * index
     *
     * @return AnonymousResourceCollection
     */
    public function index() :AnonymousResourceCollection
    {
        return TimesheetResource::collection($this->timesheetService->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
