<div class="mb-5"></div>
<div class="card">
    <div class="card-header">{{ $label }}</div>
    <div class="card-body pt-5">

        <!-- pagination is loeaded here -->
        @include('partials.pagination', ['rows' => $rows])

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>

                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Level') }}</th>
                        <th scope="col">{{ __('Parent Category') }}</th>
                        <th scope="col">{{ __('Subcategories') }}</th>
                        <th scope="col">{{ __('Description') }}</th>
                        <th scope="col">{{ __('Has Products') }}</th>
                        <th scope="col">{{ __('Products') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>

                </thead>
                <tbody>

                    @if(count($rows))
                        @foreach($rows as $row)
                            <tr>

                                <!-- name -->
                                <th width="200px">
                                    {{ $row->name }}
                                </th>

                                <!-- level -->
                                <th>
                                    {{ $row->level_id }}
                                </th>

                                <!-- parent_category -->
                                <td>
                                    @if($row->parent)
                                        <a href="{{ route('categories.edit', $row->parent->id) }}">{{ $row->parent->name }}</a><br>
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- subcategories -->
                                <td>
                                    @if(count($row->children) > 0)
                                        @foreach($row->children as $children)
                                            <a href="{{ route('categories.edit', $children->id) }}">{{ $children->name }}</a><br>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- description -->
                                <td width="200px">{{ $row->description }}</td>

                                <td>
                                    {!! getStatusIcon($row->has_products) !!}
                                </td>

                                <!-- products -->
                                <td>
                                    @if(count($row->products) > 0 && $row->has_products)
                                        @foreach($row->products as $product)
                                            <a href="{{route('products.edit', $product->id)}}">{{ $product->name }}</a><br>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- actions -->
                                <td>
                                    @include('components.table.actions', [
                                        'params' => [$row->id],
                                        'showRoute' => 'categories.show',
                                        'editRoute' => 'categories.edit',
                                        'deleteRoute' => 'categories.destroy',
                                    ])
                                </td>

                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>

        <!-- pagination is loeaded here -->
        @include('partials.pagination', ['rows' => $rows])

    </div>
</div>
