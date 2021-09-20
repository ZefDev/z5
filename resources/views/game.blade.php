@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($game)
                        <form action="/makeChoice" method="POST">
                            @csrf
                            @foreach ($choices as $choice)
                                <input type="hidden" name="idGame" value="{{$game->id}}">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="choice" id="inlineRadio{{$choice->id}}" value="{{$choice->id}}">
                                    <label class="form-check-label" for="inlineRadio{{$choice->id}}">{{ $choice->name }}</label>
                                </div>
    {{--                            <button type="button" class="btn btn-primary">{{ $choice->name }}</button>--}}
                            @endforeach
                            <input type="submit" class="btn btn-primary" value="Select">
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
