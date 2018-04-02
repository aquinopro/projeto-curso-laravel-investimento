<?php

namespace App\Presenters;

use App\Transformers\MovimentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MovimentPresenter
 *
 * @package namespace App\Presenters;
 */
class MovimentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MovimentTransformer();
    }
}
