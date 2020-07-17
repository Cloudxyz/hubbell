@php
    $label = isset($label) ? $label : '';
@endphp

<div class="card">
    <div class="card-body">

        @if ($label)
            <span class="badge badge-primary r-badge mb-4">{{ $label }}</span>
        @endif

        <!-- name -->
        @include('components.form.input', [
            'group' => 'user',
            'label' => __('Name'),
            'name' => 'name',
            'required' => true,
            'value' => $row->name
        ])

        <!-- email -->
        @include('components.form.input', [
            'group' => 'user',
            'type' => 'email',
            'label' => __('Email'),
            'name' => 'email',
            'required' => true,
            'value' => $row->email,
        ])

        <!-- password -->
        @include('components.form.input', [
            'group' => 'user',
            'type' => 'password',
            'label' => __('Password'),
            'name' => 'password',
        ])

        <!-- confirm password -->
        @include('components.form.input', [
            'group' => 'user',
            'type' => 'password',
            'label' => __('Confirm Password'),
            'name' => 'password_confirmation',
        ])

        <!-- is_enabled -->
        @include('components.form.checkbox', [
            'group' => 'user',
            'label' => __('Enabled'),
            'name' => 'is_enabled',
            'value' => 1,
            'default' => $row->is_enabled,
        ])

        <!-- roles -->
        @include('components.form.checkbox-multiple', [
            'group' => 'user',
            'label' => __('Roles'),
            'name' => 'roles_ids',
            'values' => prepareCheckboxValuesFromRows($roles),
            'default' => prepareCheckboxDefaultValues($row->roles),
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
