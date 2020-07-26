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
            'group' => 'post',
            'label' => __('Short Description'),
            'name' => 'short_description',
            'value' => $row->short_description
        ])

        <!-- long_description -->
        @include('components.form.textarea', [
            'group' => 'post',
            'label' => __('Long Description'),
            'name' => 'long_description',
            'value' => $row->long_description
        ])

        <!-- tags -->
        @include('components.form.fast-select', [
            'group' => 'post',
            'label' => __('Tags'),
            'multiple' => true,
            'name' => 'tags_ids',
            'options' => prepareSelectValuesFromRows($tags, ['labelRef' => 'name']),
            'default' => prepareSelectDefaultValues($row->tags, ['valueRef' => 'id']),
            'disableDefaultOption' => true,
        ])

        <!-- is_feature -->
        @include('components.form.checkbox', [
            'group' => 'post',
            'label' => __('Feature'),
            'name' => 'is_feature',
            'value' => 1,
            'default' => $row->is_feature,
        ])

        <!-- is_active -->
        @include('components.form.checkbox', [
            'group' => 'post',
            'label' => __('Active'),
            'name' => 'is_active',
            'value' => 1,
            'default' => $row->is_active,
        ])

        <!-- images -->
        @include('components.form.image', [
            'group' => 'post',
            'label' => __('Images'),
            'name' => 'images',
            'isMultiple' => true,
            'isImage' => true,
            'modelId' => $row->id,
            'modelType' => 'posts',
            'files' => $row->images()->get(),
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
