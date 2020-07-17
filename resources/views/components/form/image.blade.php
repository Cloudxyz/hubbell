@php
    $group = isset($group) ? $group : strtotime('now');
    $label = isset($label) ? $label : '';
    $name = isset($name) ? $name : '';
    $parentName = isset($parentName) ? $parentName : '';
    $lang = isset($lang) ? $lang : '';
    $required = isset($required) ? $required : false;
    $disabled = isset($disabled) ? $disabled : false;
    $hidden = isset($hidden) ? (bool) $hidden : false;
    $readOnly = isset($readOnly) ? (bool) $readOnly : false;
    $isMultiple = isset($isMultiple) ? (bool) $isMultiple : false;
    $hasFiles = $files->isEmpty() ? (bool) false : true;
    $isImage = isset($isImage) ? (bool) true : false;

    $id = 'field_' . $group . '_' . $name . '_' . $lang;

    $requestName = prepareFormRequestName($name, $parentName, $lang);
    $inputName = prepareFormInputName($name, $parentName, $lang);
    if ($isMultiple) {
        $inputName .= '[]';
    }

    $disabledProp = ($disabled) ? ' disabled' : '';
    $hiddenStyle = ($hidden) ? ' display: none; ' : '';
    $readOnlyProp = ($readOnly) ? ' readonly ' : '';
    $multipleProp = $isMultiple ? ' multiple ' : '';

    foreach ($files as $index => $file){
        $orderFiles[$index]['id'] = $file->id;
        $orderFiles[$index]['slug'] = $file->slug;
        $orderFiles[$index]['extension'] = $file->extension;
        $orderFiles[$index]['file_original_name'] = $file->file_original_name;
        $orderFiles[$index]['file_name'] = $file->file_name;
        $orderFiles[$index]['file_path'] = $file->file_path;
        $orderFiles[$index]['file_url'] = $file->file_url;
        $orderFiles[$index]['order'] = $file->order;
    }

    function sort_array_of_array(&$array, $subfield){
        $sortarray = array();
        foreach ($array as $key => $row)
        {
            $sortarray[$key] = $row[$subfield];
        }

        array_multisort($sortarray, SORT_ASC, $array);
    }

    sort_array_of_array($orderFiles, 'order');


@endphp

<!-- name -->
<div class="form-group row" style="{{ $hiddenStyle }}">
    <label for="{{ $id }}" class="col-sm-2 col-form-label">
        {{ $label }}

        @if ($required)
            <span>*</span>
        @endif
    </label>

    <div class="col-sm-10">

        <div>
            <input type="file"
                name="{{ $inputName }}"
                class="form-control"
                id="{{ $id }}"
                {{ $disabledProp }}
                {{ $readOnlyProp }}
                {{ $multipleProp }}
            />

            <input id="sort_files" type="hidden" name="sort_files" value="{{$files->toJson(JSON_PRETTY_PRINT)}}" />

            @if ($errors->has($requestName))
                <div class="app-form-input-error">
                    {{ $errors->first($requestName) }}
                </div>
            @endif
        </div>

        @if ($hasFiles)
            <div id="sortable"  class="app-file-wrapper">
                @foreach($orderFiles as $file)
                    <div class="card bg-dark text-white o-hidden mb-4 file-container" data-id="{{$file['id']}}" data-order="{{$file['order']}}">
                        @if ($isImage)
                            <img class="card-img" src="{{ asset(getUrlPath($file['file_url'], 'thumbnail')) }}" alt="Card image">
                        @endif

                        @php
                            $overlayClass = $isImage ? 'card-img-overlay' : 'app-card-file-overlay';
                            $textBgClass = $isImage ? 'text-white' : '';
                        @endphp
                        <div class="{{ $overlayClass }}">
                            <h5 class="card-title {{ $textBgClass }}">
                                <a href="{{ asset(getUrlPath($file['file_url'])) }}" target="_blank">
                                    {{ $file['file_name'] }}
                                </a>
                            </h5>
                            <a href="{{route('images.destroy', [$modelId, $file['id'], $modelType])}}" class="btn-delete-file">
                                <i class="i-Close"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
