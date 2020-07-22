@php
    $group = isset($group) ? $group : strtotime('now');
    $label = isset($label) ? $label : '';
    $name = isset($name) ? $name : '';
    $parentName = isset($parentName) ? $parentName : '';
    $lang = isset($lang) ? $lang : '';
    $required = isset($required) ? $required : false;
    $disabled = isset($disabled) ? $disabled : false;
    $placeholder = isset($placeholder) ? $placeholder : false;
    $value = isset($value) ? $value : '';
    $rows = isset($rows) && is_numeric($rows) ? (int) $rows : 3;
    $resize = isset($resize) ? $resize : false;
    $hidden = isset($hidden) ? (bool) $hidden : false;
    $children = isset($children) ? (bool) $children : false;

    $id = 'field_' . $group . '_' . $name . '_' . $lang;

    $requestName = prepareFormRequestName($name, $parentName, $lang);    
    $inputName = prepareFormInputName($name, $parentName, $lang);

    $disabledProp = ($disabled) ? 'disabled' : '';
    $resizeStyle = ($resize) ? 'resize: vertical;' : 'resize: none;';
    $hiddenStyle = ($hidden) ? 'display: none;' : '';
    
@endphp


<div class="form-group row" style="{{ $hiddenStyle }}">
    <label for="{{ $id }}" class="col-sm-2 col-form-label">
        {{ $label }}

        @if ($required)
            <span>*</span>
        @endif
    </label>

    <div class="col-sm-10">
        <textarea
            name="{{ $inputName }}"
            class="form-control"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            id="{{ $id }}"
            style="{{ $resizeStyle }}"
            {{ $disabledProp }}
            >{{ old($requestName, $value) }}</textarea>

        @if ($errors->has($requestName))
            <div class="app-form-input-error">
                {{ $errors->first($requestName) }}
            </div>
        @endif

        @if ($children)
            <br>
            <div class="app-children-wrapper">
                <div class="title_section_detail">{{__('Products')}}</div>
                <table class="table table-bordered table-striped">
                    <colgroup>
                        <col width="20%">
                        <col width="20%">
                        <col width="50%">
                        <col width="5%">
                        <col width="5%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>{{__('Image')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('Active')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataChildren as $key => $child)
                            <tr>
                                <td>
                                    @if(!$child->images->isEmpty())
                                        <img src="{{asset(getUrlPath($child->images[0]->file_url, 'thumbnail'))}}" alt="">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('products.edit', $child->id)}}">{{$child->name}}</a>
                                </td>
                                <td>{{$child->short_description}}</td>
                                <td>
                                    @php
                                        $enabledClass = ($child->is_active) ? 'success' : 'danger';
                                        $enabledLabel = ($child->is_active) ? __('Enabled') : __('Disabled');
                                    @endphp

                                    <span class="badge badge-{{ $enabledClass }} p-1">
                                        {{ $enabledLabel }}
                                    </span>
                                </td>
                                <td class="btns-container">
                                    <a href="{{route('products.edit', $child->id)}}" class="text-success mr-2">
                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                    </a>
                                    <a href="{{route('lists-product.destroy', [$listId, $child->id])}}" class="text-danger mr-2">
                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
