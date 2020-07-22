<!-- fields form -->
<div class="card">
    <div class="card-body">

        <!-- name -->
        @include('components.form.input', [
            'group' => 'shop',
            'label' => __('Name'),
            'name' => 'name',
            'required' => true,
            'value' => $row->name
        ])

        <!-- phone -->
        @include('components.form.input', [
            'group' => 'shop',
            'label' => __('Phone'),
            'name' => 'phone',
            'value' => $row->phone
        ])

        <!-- web -->
        @include('components.form.input', [
            'group' => 'shop',
            'label' => __('Web'),
            'name' => 'web',
            'value' => $row->web
        ])

        <!-- email -->
        @include('components.form.input', [
            'group' => 'shop',
            'label' => __('Email'),
            'name' => 'email',
            'value' => $row->email
        ])

        <!-- address -->
        @include('components.form.textarea', [
            'group' => 'shop',
            'label' => __('Address'),
            'name' => 'address',
            'value' => $row->address
        ])

        <!-- latitude -->
        @include('components.form.input', [
            'group' => 'shop',
            'label' => __('Latitude'),
            'name' => 'latitude',
            'value' => $row->latitude
        ])

        <!-- longitude -->
        @include('components.form.input', [
            'group' => 'shop',
            'label' => __('Longitude'),
            'name' => 'longitude',
            'value' => $row->longitude
        ])

        <!-- shops_types -->
        @include('components.form.fast-select', [
            'group' => 'product',
            'label' => __('Types'),
            'multiple' => true,
            'name' => 'types_ids',
            'options' => prepareSelectValuesFromRows($types, ['labelRef' => 'name']),
            'default' => prepareSelectDefaultValues($row->types, ['valueRef' => 'id']),
            'disableDefaultOption' => true,
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
