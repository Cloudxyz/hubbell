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
                        <th scope="col">{{ __('Owner') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Products') }}</th>
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

                                <!-- owner -->
                                <th>
                                    <a href="{{ route('users.show', $row->user->id) }}">{{ $row->user->name }}</a>
                                </th>

                                <!-- name -->
                                <th>
                                    {{ $row->name }}
                                </th>

                                <!-- products -->
                                <td>
                                    @foreach ($row->products as $product)
                                        <div>
                                            <a href="{{route('products.edit', $product->id)}}">{{ $product['name'] }}</a>
                                        </div>
                                    @endforeach
                                </td>

                                <!-- actions -->
                                <td>
                                    @include('components.table.actions', [
                                        'params' => [$row->id],
                                        'showRoute' => 'lists.show',
                                        'editRoute' => 'lists.edit',
                                        'deleteRoute' => 'lists.destroy',
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
