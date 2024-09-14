<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
       return[
        'id'            => $this->id,
        'first_name'    => $this->first_name,
        'last_name'     => $this->last_name,
        'email'         => $this->email,
        'gender'        => $this->gender,
        'date_of_birth' => $this->date_of_birth,
        'time_sheets'   => TimesheetResource::collection($this->whenLoaded('timesheets')),
        'projects'      => ProjectResource::collection($this->whenLoaded('projects')),
       ];
    }
}
