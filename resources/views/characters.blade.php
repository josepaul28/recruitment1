@extends('layouts.master')

@section('content')
    <div class="container" style="margin-top: 40px;">
        <h2>All Characters:</h2>
        @if(!empty($data->results) && count($data->results) > 0)
            <div style="float: right;">
                Sort by:
                <form action="" method="GET">
                    <select onchange="this.form.submit()" name="sort" class="custom-select" style="display: inline-block">
                        <option selected>Select a filter</option>
                        <option value="name" {{ !(!empty($data->filter) && $data->filter == 'name') ?: 'selected="selected"' }}>Name</option>
                        <option value="mass" {{ !(!empty($data->filter) && $data->filter == 'mass') ?: 'selected="selected"' }}>Mass</option>
                        <option value="height" {{ !(!empty($data->filter) && $data->filter == 'height') ?: 'selected="selected"' }}>Height</option>
                    </select>
                </form>
            </div>

            <div class="clearfix"></div>

            <table class="table table-striped" style="margin: 20px 0;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Height</th>
                    <th>Mass</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data->results as $key => $character)
                    <tr>
                        <td>{{ $character->name }}</td>
                        <td>{{ $character->height }}</td>
                        <td>{{ $character->mass }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else

        @endif
    </div>
@endsection