<?php

namespace App\Validations;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersValidations extends Validation
{  
    public function __construct()
    {
        $this->setDefaultValidations([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    }

    public function validate($validateEvent, Request $request, $id = '')
    {
        $eventValidations = [];
        $customValidationMessages = [];
        
        $shouldUseDefaultValidations = true;

        switch($validateEvent)   {
            case 'create':
                $eventValidations = [
                    'email' => [
                        'required',
                        'email',
                        Rule::unique('users')
                    ],
                    'password' => 'required|confirmed|min:6',
                ];
            break;
            case 'edit':
                $eventValidations = [
                    'email' => [
                        'required',
                        'email',
                        Rule::unique('users')->ignore($id)
                    ],
                    'password' => 'nullable|confirmed|min:6'
                ];
            break;
        }
        
        if($shouldUseDefaultValidations) {
            $validations = array_merge($this->getDefaultValidations(), $eventValidations);
        } else {
            $validations = $eventValidations;
        }

        $this->runValidations($request->all(), $validations, $customValidationMessages);
    }
}
