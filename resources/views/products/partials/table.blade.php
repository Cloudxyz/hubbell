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
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Price') }}</th>
                        <th scope="col">{{ __('Discount Price') }}</th>
                        <th scope="col">{{ __('Description') }}</th>
                        <th scope="col">{{ __('Is Active') }}</th>
                        <th scope="col">{{ __('Categories') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>

                </thead>
                <tbody>

                    @if(count($rows))
                        @foreach($rows as $row)
                            <tr>
                                <!-- id -->
                                <th scope="row">
                                    {{ $row->id }}
                                </th>

                                <!-- name -->
                                <th>
                                    {{ $row->name }}
                                </th>

                                <!-- price -->
                                <td>{{ $row->price }} </td>

                                <!-- discount_price -->
                                <td>{{ $row->discount_price }}</td>

                                <!-- short_description -->
                                <td width="300px">{{ $row->short_description }}</td>

                                <!-- is_active -->
                                <td>
                                    {!! getStatusIcon($row->is_active) !!}
                                </td>

                                <!-- categories -->
                                <td>
                                    @if(count($row->categories) > 0)
                                        @foreach($row->categories as $category)
                                            <a href="{{route('categories.edit', $category->id)}}">{{ $category->name }}</a><br>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- actions -->
                                <td>
                                    @include('components.table.actions', [
                                        'params' => [$row->id],
                                        'showRoute' => 'products.show',
                                        'editRoute' => 'products.edit',
                                        'deleteRoute' => 'products.destroy',
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
