<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

	protected $rules = [
		'name' => 'required|unique:users',
		'email'    => 'required|email|unique:users',
		'password' => 'required'
		'phone' => 'required'
	];

} 