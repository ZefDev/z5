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
                    <div>
                        <a class="btn btn-primary" href="/home" role="button">all</a>
                        @foreach ($steps as $step)
                            <a class="btn btn-primary" href="/home/{{ $step->id }}" role="button">{{ $step->name }}</a>
                        @endforeach
                        <a class="btn btn-primary" href="/newgame" role="button">add new game</a>
                    </div>

                    <div class="row">
                        @foreach ($games as $game)
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$game->createrUser->email}}</h5>
                                    <p class="card-text">{{$game->step->name}}</p>
                                    <p class="card-text">Id game: {{$game->id}}</p>
                                    <a href="/game/{{$game->id}}" class="btn btn-primary">Connect</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
