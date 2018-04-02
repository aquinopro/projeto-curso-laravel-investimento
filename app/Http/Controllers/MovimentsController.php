<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovimentCreateRequest;
use App\Http\Requests\MovimentUpdateRequest;
use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use App\Entities\{Group, Product, Moviment};
use Auth;

class MovimentsController extends Controller
{

    /**
     * @var MovimentRepository
     */
    protected $repository;

    /**
     * @var MovimentValidator
     */
    protected $validator;

    public function __construct(MovimentRepository $repository, MovimentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

	public function index()
	{
		return view('moviment.index', [
			'product_list' => Product::all(),
		]);
	}

    public function application()
    {
        $user           = Auth::user();
        $group_list     = $user->groups->pluck('name', 'id');
        $product_list   = Product::all()->pluck('name', 'id');

        return view('moviment.application', [
            'group_list'    => $group_list,
            'product_list'  => $product_list,
        ]);
	}
	
	public function storeApplication(Request $request)
	{
		$movimento = Moviment::create([
			'user_id' 		=> Auth::user()->id, 
			'group_id' 		=> $request->get('group_id'), 
			'product_id' 	=> $request->get('product_id'), 
			'value' 		=> $request->get('value'), 
			'type' 			=> 1,
		]);

		session()->flash('success', [
			'success' => true,
			'messages' => "Sua aplicação de " . $movimento->value . " no produto " . $movimento->product->name . " foi realizada com sucesso!",
		]);

		return redirect()->route('moviment.application');
	}

    public function getback()
    {
        $user           = Auth::user();
        $group_list     = $user->groups->pluck('name', 'id');
        $product_list   = Product::all()->pluck('name', 'id');

        return view('moviment.getback', [
            'group_list'    => $group_list,
            'product_list'  => $product_list,
        ]);
	}
	
	public function storeGetBack(Request $request)
	{
		$movimento = Moviment::create([
			'user_id' 		=> Auth::user()->id, 
			'group_id' 		=> $request->get('group_id'), 
			'product_id' 	=> $request->get('product_id'), 
			'value' 		=> $request->get('value'), 
			'type' 			=> 2,
		]);

		session()->flash('success', [
			'success' => true,
			'messages' => "Seu resgate de " . $movimento->value . " no produto " . $movimento->product->name . " foi realizado com sucesso!",
		]);

		return redirect()->route('moviment.application');
	}

	public function all()
	{
		$moviment_list = Auth::user()->moviments;

		return view('moviment.all', [
			'moviment_list' => $moviment_list,
		]);
	}
}



















