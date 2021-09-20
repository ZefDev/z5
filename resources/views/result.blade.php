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
                    @if ($game->status == 1)
                        <p>Game not end</p>
                            <a href="/result/{{$game->id}}" class="btn btn-primary" >Refresh</a>
                    @endif
                    @if ($game->status == 2)
                        <p>User: {{$game->createrUser->name}} {{$game->result}} the user: {{$game->secondUser->name}}</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
