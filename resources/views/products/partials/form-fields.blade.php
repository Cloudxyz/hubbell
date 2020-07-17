<!-- fields form -->
<div class="card">
    <div class="card-body">

        <!-- name -->
        @include('components.form.input', [
            'group' => 'product',
            'label' => __('Name'),
            'name' => 'name',
            'required' => true,
            'value' => $row->name
        ])

        <!-- slug -->
        @include('components.form.input', [
            'group' => 'product',
            'label' => __('Slug'),
            'name' => 'slug',
            'value' => $row->slug
        ])


        <!-- catalog_id -->
        @include('components.form.input', [
            'group' => 'product',
            'label' => __('Catalog ID'),
            'name' => 'catalog_id',
            'value' => $row->catalog_id
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

        <!-- categories -->
        @include('components.form.fast-select', [
            'group' => 'product',
            'label' => __('Categories'),
            'multiple' => true,
            'name' => 'categories_ids',
            'options' => prepareSelectValuesFromRows($categories, ['labelRef' => 'name']),
            'default' => prepareSelectDefaultValues($row->categories, ['valueRef' => 'id']),
            'disableDefaultOption' => true,
        ])

        <!-- resources -->
        @include('components.form.file', [
            'group' => 'product',
            'label' => __('Resources'),
            'name' => 'resources',
            'isMultiple' => true,
            'fileName' => $row->file_original_name,
            'filePath' => $row->file_path,
            'fileUrl' => $row->file_url,
            'fileExtension' => $row->extension,
        ])

        <!-- images -->
        @include('components.form.image', [
            'group' => 'product',
            'label' => __('Images'),
            'name' => 'images',
            'isMultiple' => true,
            'isImage' => true,
            'modelId' => $row->id,
            'modelType' => 'products',
            'files' => $row->images()->get(),
        ])

    </div>
</div>

<!-- separator -->
<div class="mb-4"></div>
