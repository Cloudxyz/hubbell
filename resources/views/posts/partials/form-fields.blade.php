<!-- fields form -->
<div class="card">
    <div class="card-body">

        <!-- title -->
        @include('components.form.input', [
            'group' => 'post',
            'label' => __('Title'),
            'name' => 'title',
            'required' => true,
            'value' => $row->title
        ])

        <!-- slug -->
        @include('components.form.input', [
            'group' => 'post',
            'label' => __('Slug'),
            'name' => 'slug',
            'value' => $row->slug
        ])

        <!-- short_description -->
        @include('components.form.textarea', [
            'group' => 'product',
            'label' => __('Short Description'),
            'name' => 'short_description',
            'value' => $row->short_description
        ])

        <!-- long_description -->
        @include('components.form.textarea', [
            'group' => 'product',
            'label' => __('Long Description'),
            'name' => 'long_description',
            'value' => $row->long_description
        ])

        <!-- tags -->
        @include('components.form.fast-select', [
            'group' => 'product',
            'label' => __('Tags'),
            'multiple' => true,
            'name' => 'tags_ids',
            'options' => prepareSelectValuesFromRows($tags, ['labelRef' => 'name']),
            'default' => prepareSelectDefaultValues($row->tags, ['valueRef' => 'id']),
            'disableDefaultOption' => true,
        ])

        <!-- is_feature -->
        @include('components.form.checkbox', [
            'group' => 'user',
            'label' => __('Feature'),
            'name' => 'is_feature',
            'value' => 1,
            'default' => $row->is_feature,
        ])

        <!-- is_active -->
        @include('components.form.checkbox', [
            'group' => 'user',
            'label' => __('Active'),
            'name' => 'is_active',
            'value' => 1,
            'default' => $row->is_active,
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
