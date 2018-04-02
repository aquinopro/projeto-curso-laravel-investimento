<?php

namespace App\Presenters;

use App\Transformers\InstituitionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InstituitionPresenter
 *
 * @package namespace App\Presenters;
 */
class InstituitionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InstituitionTransformer();
    }
}
