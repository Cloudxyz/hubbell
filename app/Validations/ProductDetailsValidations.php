<?php

namespace App\Validations;

use Illuminate\Http\Request;

class ProductDetailsValidations extends Validation
{  
    public function __construct() {
        $this->setDefaultValidations([
            'title' => 'required',
            'description' => 'required',
        ]);
    }

    public function validate($validateEvent = '', Request $request, $id = '')
    {
        $eventValidations = [];
        $customValidationMessages = [];

        switch($validateEvent)   {
            case 'create': break;
            case 'edit': break;
        }

        $validations = array_merge($this->getDefaultValidations(), $eventValidations);

        $this->runValidations($request->all(), $validations, $customValidationMessages);
    }
}
