<?php

if (!function_exists('prepareFormInputName')) {

    function prepareFormInputName($name, $parentName, $lang)
    {
        $inputName = $name;
        if ($lang) {
            if ($parentName) {
                $inputName = "{$lang}[{$parentName}][$name]";
            } else {
                $inputName = "{$lang}[{$name}]";
            }
        } else if ($parentName) {
            $inputName = "{$parentName}[{$name}]";
        }

        return $inputName;
    }
}

if (!function_exists('prepareFormRequestName')) {
    function prepareFormRequestName($name, $parentName, $lang)
    {
        $requestName = $name;
        if ($lang) {
            if ($parentName) {
                $requestName = "{$lang}.{$parentName}.{$name}";
            } else {
                $requestName = "{$lang}.{$name}";
            }
        } else if ($parentName) {
            $requestName = "{$parentName}.{$name}";
        }

        return $requestName;
    }
}

if (!function_exists('isORMObj')) {
    function isORMObj($obj)
    {
        return method_exists($obj, 'count');
    }
}

if (!function_exists('prepareCheckboxValuesFromRows')) {
    function prepareCheckboxValuesFromRows($items, $config = [])
    {
        $shouldLoopForValues = (isORMObj($items) && $items->count()) || (!isORMObj($items) && is_array($items));
        $values = [];

        if ($shouldLoopForValues) {
            $valueRef       = isset($config['valueRef']) ? $config['valueRef'] : 'id'; // default id
            $labelRef       = isset($config['labelRef']) ? $config['labelRef'] : 'name'; // default name
            $secondLabelRef = isset($config['secondLabelRef']) ? $config['secondLabelRef'] : ''; // default empty

            foreach ($items as $item) {
                $labelRefValue = isset($item->{$labelRef}) ? $item->{$labelRef} : '';
                $secondLabelRefValue = isset($item->{$secondLabelRef}) ? $item->{$secondLabelRef} : '';

                $values[] = [
                    'label' => trim($labelRefValue . ' ' . $item->{$secondLabelRefValue}),
                    'value' => isset($item->{$valueRef}) ? $item->{$valueRef} : '',
                ];
            }
        }

        return $values;
    }
}

if (!function_exists('prepareCheckboxDefaultValues')) {
    function prepareCheckboxDefaultValues($items, $config = [])
    {
        $shouldLoopForValues = (isORMObj($items) && $items->count()) || (!isORMObj($items) && is_array($items));
        $defaultValues = [];

        if ($shouldLoopForValues) {
            $valueRef = isset($config['valueRef']) ? $config['valueRef'] : 'id'; // default id

            foreach ($items as $item) {
                $defaultValues[] = isset($item->{$valueRef}) ? $item->{$valueRef} : '';
            }
        }

        return $defaultValues;
    }
}

if (!function_exists('prepareSelectValuesFromRows')) {
    function prepareSelectValuesFromRows($items, $config = [])
    {
        $shouldLoopForValues = (isORMObj($items) && $items->count()) || (!isORMObj($items) && is_array($items));
        $values = [];

        if ($shouldLoopForValues) {
            $valueRef       = isset($config['valueRef']) ? $config['valueRef'] : 'id'; // default id
            $labelRef       = isset($config['labelRef']) ? $config['labelRef'] : 'name'; // default name

            foreach ($items as $item) {
                $values[] = [
                    'label' => isset($item->{$labelRef}) ? $item->{$labelRef} : '',
                    'value' => isset($item->{$valueRef}) ? $item->{$valueRef} : '',
                ];
            }
        }

        return $values;
    }
}

if (!function_exists('prepareSelectDefaultValues')) {
    function prepareSelectDefaultValues($items, $config = [])
    {
        $shouldLoopForValues = (isORMObj($items) && $items->count()) || (!isORMObj($items) && is_array($items));
        $defaultValues = [];

        if ($shouldLoopForValues) {
            $valueRef = isset($config['valueRef']) ? $config['valueRef'] : 'id'; // default id

            foreach ($items as $item) {
                $defaultValues[] = isset($item->{$valueRef}) ? $item->{$valueRef} : '';
            }
        }

        return $defaultValues;
    }
}

if (!function_exists('priceFormat')) {
    function priceFormat($price, $decimals = 2)
    {
        if ($price < 0) {
            return '-$' . number_format(abs($price), $decimals);
        }

        return '$' . number_format($price, $decimals);
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($isEnabled = false)
    {
        if ($isEnabled) {
            return '<i class="nav-icon i-Yes font-weight-bold text-success"></i>';
        }

        return '<i class="nav-icon i-Close font-weight-bold text-danger"></i>';
    }
}

if (!function_exists('getCurrentDate')) {
    function getCurrentDate()
    {
        return date('Y-m-d', strtotime('now'));
    }
}

if (!function_exists('getCurrentDateTime')) {
    function getCurrentDateTime()
    {
        return date('Y-m-d H:i:s', strtotime('now'));
    }
}

if (!function_exists('preparePhoneContacts')) {
    function preparePhoneContacts($phones)
    {
        return implode(' <b>/</b> ', $phones);
    }
}

if (!function_exists('getUrlPath')) {
    function getUrlPath($filePath, $thumbnailType = '')
    {
        return \App\Helpers\ImagesHelper::getUrlPath($filePath, $thumbnailType);
    }
}


if (!function_exists('getCurrentUrlFull')) {
    function getCurrentUrlFull($export)
    {
        $union = (Request::fullUrl() ==  Request::url()) ? '?' : '&';
        return Request::fullUrl() . $union . $export . '=1';
    }
}

if (!function_exists('deleteAccents')) {
    function deleteAccents($string)
    {

        //Codificamos la cadena en formato utf8 en caso de que nos de errores
        $string = utf8_encode($string);
        $string = trim($string);
        $string = strtolower($string);
        $string = str_replace(' ', '-', $string);


        //Ahora reemplazamos las letras
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $string
        );

        $string = preg_replace("/[^a-zA-Z0-9\_\-]+/", "", $string);

        return $string;
    }
}
