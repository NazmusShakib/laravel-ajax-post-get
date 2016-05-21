<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class ProfileForm extends FormValidator {

	protected $rules = [
		'name'         => 'required',
		'email'              => 'required',
		'phone' => 'required',
		'password'  => 'required'
	];

} 