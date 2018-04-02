<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Group;

/**
 * Class GroupTransformer
 * @package namespace App\Transformers;
 */
class GroupTransformer extends TransformerAbstract
{

    /**
     * Transform the \Group entity
     * @param \Group $model
     *
     * @return array
     */
    public function transform(Group $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
