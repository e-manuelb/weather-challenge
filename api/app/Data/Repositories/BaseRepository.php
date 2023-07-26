<?php

namespace App\Data\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    private Model $model;

    /**
     * @return Model
     */
    protected function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    protected function setModel(Model $model): void
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return Model|Builder
     */
    public function create(array $data = []): Model|Builder
    {
        return $this->model->query()->create($data);
    }

    /**
     * @return Collection|array
     */
    public function get(): Collection|array
    {
        return $this->model->query()->get();
    }

    /**
     * @param $id
     * @return Model|Collection|Builder|array|null
     */
    public function find($id): Model|Collection|Builder|array|null
    {
        return $this->model->query()->find($id);
    }

    /**
     * @param $id
     * @return Model|Collection|Builder|array|null
     */
    public function findOrFail($id): Model|Collection|Builder|array|null
    {
        return $this->model->query()->findOrFail($id);
    }

    /**
     * @param $id
     * @param array $data
     * @return Model|Collection|Builder|array|null
     */
    public function updateById($id, array $data = []): Model|Collection|Builder|array|null
    {
        $entity = $this->findOrFail($id);

        $entity->update($data);

        return $entity;
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteById($id): void
    {
        $this->model->query()->where('id', $id)->delete();
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->model->query();
    }

    /**
     * @param int|null $perPage
     * @param array|null $columns
     * @param string|null $pageName
     * @param int|null $page
     * @return LengthAwarePaginator
     */
    public function paginate(
        ?int    $perPage = null,
        ?array  $columns = ['*'],
        ?string $pageName = 'page',
        ?int    $page = null
    ): LengthAwarePaginator
    {
        return $this->model->query()->paginate($perPage, $columns, $pageName, $page);
    }
}
