<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 16-5-22
 * Time: 上午10:38
 */

namespace App\Repositories;


/**
 * Class Repository
 * the base class
 * @package App\Repositories
 */
class Repository implements RepositoryInterface
{
    protected $model;

    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage,$columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id,$columns);
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        return $this->model->findBy($field,$value,$columns);
    }
}