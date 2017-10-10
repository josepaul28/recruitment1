@extends('layouts.master')

@section('content')
    <div class="card">
        <h4 class="card-header">{{ $data->name }}</h4>
        <div class="card-body">
            <h4 class="card-title">Character data:</h4>
            <ul class="list-group">
                <li class="list-group-item">Height: {{ $data->height }}</li>
                <li class="list-group-item">Mass: {{ $data->mass }}</li>
                <li class="list-group-item">Hair Color: {{ $data->hair_color }}</li>
                <li class="list-group-item">Skin Color: {{ $data->skin_color }}</li>
                <li class="list-group-item">Eye Color: {{ $data->eye_color }}</li>
                <li class="list-group-item">Birth Year: {{ $data->birth_year }}</li>
                <li class="list-group-item">Gender: {{ $data->gender }}</li>
            </ul>
            <div style="margin: 20px 0;">
                <a href="../" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection