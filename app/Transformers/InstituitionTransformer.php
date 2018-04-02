<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Instituition;

/**
 * Class InstituitionTransformer
 * @package namespace App\Transformers;
 */
class InstituitionTransformer extends TransformerAbstract
{

    /**
     * Transform the \Instituition entity
     * @param \Instituition $model
     *
     * @return array
     */
    public function transform(Instituition $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
