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
    $hasDetails = $details->isEmpty() ? (bool) false : true;

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

    $getDetails = [];

    foreach($details as $key => $detail){
        $getDetails[$detail['title_section']]['details'][$key]['id'] = $detail->id;
        $getDetails[$detail['title_section']]['details'][$key]['title'] = $detail->title;
        $getDetails[$detail['title_section']]['details'][$key]['description'] = $detail->description;
        $getDetails[$detail['title_section']]['details'][$key]['product_id'] = $detail->product_id;
    }

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

        <div class="btn btn-success add_detail">
            <i class="i-Add"></i>Agregar Detalle
        </div>
        <div id="details_container">
            @if ($errors->has($requestName))
                <div class="app-form-input-error">
                    {{ $errors->first($requestName) }}
                </div>
            @endif
        </div>

        @if ($hasDetails)
            <div class="app-details-wrapper">
                <div class="modal_detail">
                    <div class="detail_container_edit">
                        <input id="id_edit" class="form-control" type="hidden" name="id_edit" />
                        <div class="input-container">
                            <label for="title_section_edit">Titulo Sección</label><br>
                            <input id="title_section_edit" class="form-control" type="text" name="title_section_edit" />
                        </div>
                        <div class="input-container">
                            <label for="title_edit">Titulo</label><br>
                            <input id="title_edit" class="form-control" type="text" name="title_edit" />
                        </div>
                        <br>
                        <div class="input-container">
                            <label for="description_edit">Descripción</label><br>
                            <textarea id="description_edit" class="form-control" name="description_edit"></textarea>
                        </div>
                    </div>
                </div>
                @foreach($getDetails as $key => $detail)
                    <div class="title_section_detail">{{$key}}</div>
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col width="45%">
                            <col width="45%">
                            <col width="5%">
                        </colgroup>
                        <tbody>
                            @foreach ($detail['details'] as $item)
                                <tr class="parent_detail">
                                    <td>{{$item['title']}}</td>
                                    <td>{{$item['description']}}</td>
                                    <td class="btns-container">
                                        <a href="#" class="btn_edit_detail text-success mr-2" data-title-section="{{$key}}" data-id="{{$item['id']}}" data-title="{{$item['title']}}" data-description="{{$item['description']}}">
                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                        </a>
                                        <a href="{{route('product-details.destroy', [$item['product_id'], $item['id']])}}" class="text-danger mr-2">
                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        @endif
    </div>
</div>
