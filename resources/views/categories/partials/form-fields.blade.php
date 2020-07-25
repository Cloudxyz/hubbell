<!-- fields form -->
<div class="card">
    <div class="card-body">

        <!-- name -->
        @include('components.form.input', [
            'group' => 'category',
            'label' => __('Name'),
            'name' => 'name',
            'required' => true,
            'value' => $row->name
        ])

        <!-- slug -->
        @include('components.form.input', [
            'group' => 'category',
            'label' => __('Slug'),
            'name' => 'slug',
            'value' => $row->slug
        ])

        <!-- description -->
        @include('components.form.textarea', [
            'group' => 'category',
            'label' => __('Description'),
            'name' => 'description',
            'value' => $row->description
        ])

        <!-- level_id -->
        @include('components.form.select', [
            'group' => 'category',
            'label' => __('Level Category'),
            'name' => 'level_id',
            'value' => $row->level_id,
            'options' => $levels,
            'optionValueRef' => 'id',
            'optionLabelRef' => 'name',
            'disableDefaultOption' => true
        ])

        <!-- parent_id -->
        @if(($row->level_id) && ($row->level_id != 1))
            @include('components.form.select', [
                'group' => 'category',
                'label' => __('Parent Category'),
                'name' => 'parent_id',
                'value' => $row->parent_id,
                'options' => $parentCategories,
                'optionValueRef' => 'id',
                'optionLabelRef' => 'name'
            ])
        @endif

        <!-- has_products -->
        @if($row->level_id != 1)
            @include('components.form.checkbox', [
                'group' => 'category',
                'label' => __('Has Products'),
                'name' => 'has_products',
                'value' => 1,
                'default' => $row->has_products,
            ])
            <div class="legend_has_products">
                Checkbox only must be selected when it is the last level of the category branch
            </div>
        @endif

        <!-- images -->
        @include('components.form.image', [
            'group' => 'product',
            'label' => __('Images'),
            'name' => 'images',
            'isMultiple' => false,
            'isImage' => true,
            'modelId' => $row->id,
            'modelType' => 'categories',
            'files' => $row->images()->get(),
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
