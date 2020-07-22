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
            'label' => __('Owner'),
            'name' => 'user_id',
            'value' => $row->user_id,
            'options' => $users,
            'translatable' => false,
            'optionValueRef' => 'id',
            'optionLabelRef' => 'name',
            'required' => true,
            'disableDefaultOption' => true
        ])

        <!-- products -->
        @include('components.form.textarea', [
            'group' => 'product',
            'label' => __('Products'),
            'name' => 'products',
            'placeholder' => __('Add One Product Identifier Per Line (Catalog Number or Product Name)'),
            'children' => true,
            'listId' => $row->id,
            'dataChildren' => $row->products
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
