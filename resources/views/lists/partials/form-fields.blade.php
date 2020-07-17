<!-- fields form -->
<div class="card">
    <div class="card-body">

        <!-- name -->
        @include('components.form.input', [
            'group' => 'list',
            'label' => __('Name'),
            'name' => 'name',
            'required' => true,
            'value' => $row->name
        ])

        <!-- user_id -->
        @include('components.form.select', [
            'group' => 'list',
            'label' => __('User'),
            'name' => 'user_id',
            'value' => $row->user_id,
            'options' => $users,
            'translatable' => false,
            'optionValueRef' => 'id',
            'optionLabelRef' => 'name',
            'required' => true,
            'disableDefaultOption' => true
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
