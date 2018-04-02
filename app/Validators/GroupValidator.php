<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class GroupValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'name' 				=> 'required',
        	'user_id' 			=> 'required|exists:users,id',
        	'instituition_id' 	=> 'required|exists:instituitions,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
        	'name' 				=> 'required',
        ],
   ];
}
