<?php

namespace App\Http\Resources;

use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Timesheet
 */

class TimesheetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'task_name'   => $this->task_name,
            'date'        => $this->date,
            'hours'       => $this->hours,
            'user'        => UserResource::make($this->whenLoaded('user')),
            'project'     => ProjectResource::make($this->whenLoaded('project')),

           ];
    }
}
