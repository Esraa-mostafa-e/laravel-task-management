<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TimesheetResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Project
 */

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'name'          => $this->name,
            'department'    => $this->department,
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date,
            'status'        => $this->status,
            'time_sheets'   => TimesheetResource::collection($this->whenLoaded('timesheets')),
            'users'         => UserResource::collection($this->whenLoaded('users')),


           ];
    }
}
