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

    $fileName = isset($fileName) ? $fileName : '';
    $filePath = isset($filePath) ? $filePath : false;
    $fileUrl = isset($fileUrl) ? $fileUrl : false;
    $fileExtension = isset($fileExtension) ? $fileExtension : false;

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

        <div class="btn btn-success add_resource">
            <i class="i-Add"></i>Agregar Recurso
        </div>
        <div id="resources_container">
            @if ($errors->has($requestName))
                <div class="app-form-input-error">
                    {{ $errors->first($requestName) }}
                </div>
            @endif
        </div>

        @if ($hasFiles)
            <div class="app-file-wrapper">
                @foreach($files as $file)
                    <div class="card-resource card bg-dark text-white o-hidden mb-4 file-container" data-id="{{$file['id']}}" data-order="{{$file['order']}}">
                        <div class="title_container">
                            <div class="title_section">
                                {{$file['title_section']}}
                            </div>
                            <a href="{{route('resources.destroy', [$modelId, $file['id'], $modelType])}}" class="btn-delete-file">
                                <i class="i-Close"></i>
                            </a></div>
                        <h5 class="card-title">
                            <a href="{{ asset(getUrlPath($file['file_url'])) }}" target="_blank">
                                {{ $file['file_name'] }}
                            </a>
                        </h5>
                        <img class="card-img" src="{{ asset('assets/images/file.png') }}" alt="Card image">

                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
