@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier <strong>{{ $user->name }}</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group has-feedback">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('email') ?? $user->name}}" required autocomplete="name" placeholder="Nom">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" autofocus placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @foreach ($roles as $role)
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}" @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                            <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>

                        </div>

                        @endforeach
                        <button type="submit" class="btn btn-primary">Modifier les informations</button>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection