@extends('layouts.master')

@push('css')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    form#search_form input[type=text] {
        width: 80%;
        margin: 20px auto;
        display: block;
        height: 40px;
        padding: 0 10px;
    }

</style>
@endpush

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Starwars Client
            </div>

            <div>
                <form id="search_form"  action="character" method="GET">
                    <input type="text" name="name" placeholder="Type the name of the character that you are looking for" />
                    <button type="submit" class="btn btn-primary">Search!</button>
                </form>
                <div style="margin-top: 20px">
                    <p>or</p>
                    <a href="characters">Show all characters</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')

@endpush
