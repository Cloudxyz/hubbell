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
                        <th scope="col">{{ __('Tags') }}</th>
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

                                <!-- title -->
                                <th>
                                    {{ $row->title }}
                                </th>

                                <!-- tags -->
                                <td>
                                    @if(count($row->tags) > 0)
                                        @foreach($row->tags as $tag)
                                            <a href="{{route('tags.edit', $tag->id)}}">{{ $tag->name }}</a><br>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- images -->
                                <td>
                                    @if($row->images())
                                        @foreach($row->images as $image)
                                            <img src="{{ asset(getUrlPath($image['file_url'], 'tiny')) }}" alt="">
                                        @endforeach
                                    @endif
                                </td>

                                <!-- actions -->
                                <td>
                                    @include('components.table.actions', [
                                        'params' => [$row->id],
                                        'showRoute' => 'posts.show',
                                        'editRoute' => 'posts.edit',
                                        'deleteRoute' => 'posts.destroy',
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
