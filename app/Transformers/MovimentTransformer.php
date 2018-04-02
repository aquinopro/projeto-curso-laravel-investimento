<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Moviment;

/**
 * Class MovimentTransformer
 * @package namespace App\Transformers;
 */
class MovimentTransformer extends TransformerAbstract
{

    /**
     * Transform the \Moviment entity
     * @param \Moviment $model
     *
     * @return array
     */
    public function transform(Moviment $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
