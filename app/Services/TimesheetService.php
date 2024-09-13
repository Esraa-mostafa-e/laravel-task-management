<?php

namespace App\Services;

use App\Models\Timesheet;

class TimesheetService extends BaseService
{
    /**
     * Return model instance.
     *
     * @return string
     */
    public function model(): string
    {
        return Timesheet::class;
    }
}
