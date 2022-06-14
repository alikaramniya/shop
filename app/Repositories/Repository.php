<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

abstract class Repository
{
    private $model;

    abstract public function model();

    public function __construct()
    {
        return $this->model = app($this->model());
    }

    /**
     * All method return all data from table
     *
     * @return \Illuminate\Http\Response
     */
    public function all($isPaginate = true, $paginate = 15)
    {
        if ($isPaginate)
            return $this->model->orderByDesc('id')->paginate($paginate);
        else
            return $this->model->orderByDesc('id')->get();
    }

    /**
     * Return data according paginate
     *
     * @param int  $paginate
     * @return \Illuminate\Http\Response
     */
    public function paginate($paginate = 15)
    {
        return $this->model->orderByDesc('id')->paginate($paginate);
    }

    /**
     * Return the list models with relations and according paginate
     *
     * @param int  $relations
     * @return \Illuminate\Http\Response
     */
    public function paginateWith(array $relations, $paginate = 15)
    {
        return $this->model
            ->with($relations)
            ->orderByDesc('id')
            ->paginate($paginate);
    }

    /**
     * Has trashed mthod for check has soft deleted record or no
     *
     * @return \Illuminate\Http\Response
     */
    public function haveSoftDeleted()
    {
        return $this->model->onlyTrashed()->exists();
    }

    /**
     * GetBy method according column
     * 
     * @param string  $column
     * @param string  $operator
     * @param int|string|bool  $value
     * @param int  $limit
     * @return \Illuminate\Http\Response
     */
    public function getBy($column, $value, string $operator = '=', int $limit = null)
    {
        return $limit
            ? $this->model->where($column, $operator, $value)->limit($limit)->get()
            : $this->model->where($column, $operator, $value)->get();
    }

    /**
     * Get some filed form each record
     *
     * @param array  $column
     * @return \Illuminate\Http\Response
     */
    public function getByColumn(array $columns, bool $isPaginate = true, int $paginate = 15)
    {
        if ($isPaginate)
            return $this->model->select($columns)->orderByDesc('id')->paginate($paginate);
        else
            return $this->model->orderByDesc('id')->get($columns);
    }

    /**
     * GetByMultiColumn method for create multi condition for get data
     *
     * @param array  $condition
     * @param array  $columns
     * @return \Illuminate\Http\Response
     */
    public function getByMultiColumn(array $condition, $columns = null)
    {
        return $columns
            ? $this->model->where($condition)->orderByDesc('id')->get($columns)
            : $this->model->where($condition)->orderByDesc('id')->get();
    }

    /**
     * Insert for add new record in table
     *
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    public function insert(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Find method for get record by $id
     *
     * @param int  $id
     * @param array  $column
     * @return \Illuminate\Http\Response;
     */
    public function find(int $id, $column = null)
    {
        return $column
            ? $this->model->find($id, $columns)
            : $this->model->find($id);
    }

    /**
     * Update method for update one record for table
     *
     * @param object $model
     * @param array  $data
     * @return \Illuminate\Http\Response
     */
    public function update($model, array $data)
    {
        return $model->update($data);
    }

    /**
     * Delete method for remove one record
     *
     * @param object  $model
     * @return \Illuminate\Http\Response
     */
    public function delete($model)
    {
        return $model->delete();
    }

    /**
     * Force delete the record
     *
     * @param model  $model
     * @return \Illuminate\Http\Response
     */
    public function deleteForceModel($model)
    {
        return $model->forceDelete();
    }

    /**
     * List soft Delted model
     *
     * @return \Illuminate\Http\Response
     */
    public function listSoftDeleted($isPaginate = null, $paginate = 15)
    {
        return match ($isPaginate) {
            null => $this->model->onlyTrashed()->get(),
            default => $this->model->onlyTrashed()->paginate($paginate)
        };
    }

    /**
     * Delete soft deleted for remove one record soft deleted
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSoftDeleted(int $id)
    {
        $model = $this->model->onlyTrashed()->whereId($id)->first();

        $this->deleteFileDirectory($model->image);

        $this->deleteForceModel($model);
    }

    /**
     * restore method for back model
     *
     * @param int  $id 
     * @return \Illuminate\Http\Response
     */
    public function restore(int $id)
    {
        return $this->model->onlyTrashed()->whereId($id)->restore();
    }

    /**
     * eixsts method for check has record or no
     *
     * @param int  $id
     * @return boolean  true | false
     */
    public function exists($id)
    {
        return $this->model->where('id', $id)->exists();
    }

    /**
     * Uploader for uploader new image
     *
     * @param $image
     * @return \Illuminate\Http\Response
     */
    public function uploader($dir, $image)
    {
        $randomNameFolder = microtime(true);
        $path = $image->store("public/admin/{$dir}/{$randomNameFolder}");

        return substr($path, strlen('public/'));
    }

    /**
     * Delete file
     *
     * @param  $image
     * @return \Illuminate\Http\Response
     */
    public function deleteFileDirectory($image)
    {
        $directory = 'public/' . dirname($image);

        if (Storage::exists('public/' . $image))
            Storage::delete('public/' . $image);

        if (Storage::exists($directory))
            Storage::deleteDirectory($directory);
    }
}
