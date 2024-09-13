<?php

namespace App\Services;

use App\Models\Project;

class ProjectService extends BaseService
{
    /**
     * Return model instance.
     *
     * @return string
     */
    public function model(): string
    {
        return Project::class;
    }
}
