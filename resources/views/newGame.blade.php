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

                        <form action="/newgame" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Type game</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="step">
                                    @foreach ($steps as $step)
                                        <option value="{{$step->id}}">{{$step->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Start">
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
