<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\InstituitionRepository;
use App\Entities\Instituition;
use App\Validators\InstituitionValidator;

/**
 * Class InstituitionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class InstituitionRepositoryEloquent extends BaseRepository implements InstituitionRepository
{

    public function selectBoxList(string $descricao = 'name', string $chave = 'id')
    {
        return $this->model->pluck($descricao, $chave)->all();
    }


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Instituition::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return InstituitionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
