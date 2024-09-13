<?php

namespace App\Services;

use App\QueryBuilders\BaseQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

abstract class BaseService
{
    protected $model;
    /**
     * @return class-string<Model|BaseQueryBuilder>
     */
    abstract public function model(): string;

    public function all(

    ) {
        return $this->model()::all();
    }

    public function create(array $data)
    {
        return $this->model()::create($data);
    }

    public function update(Model $model, array $data)
    {
        return $model->update($data);
    }

    public function updateOrCreate(array $data, array $uniqueFieldsArray = []): mixed
    {
        return $this->model()::updateOrCreate($uniqueFieldsArray, $data);
    }

    public function delete(Model $model): ?bool
    {
        try {
            return $model->delete();
        } catch (QueryException $exception) {
            report($exception);
            return false;
        }
    }

}
