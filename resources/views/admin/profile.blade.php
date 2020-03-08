@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>User's profile</h2></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- Email --}}
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                                </div>
                                {{-- Name --}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control is-valid" id="name" name="name" value="{{ $user->name }}" required>
                                </div>
                                {{-- Age --}}
                                <div class="form-group">
                                    <label for="name">Age</label>
                                    <input type="text" class="form-control is-valid" id="age" name="age" value="{{ $user->age }}" required>
                                </div>
                                {{-- About --}}
                                <div class="form-group">
                                    <label for="about">About me</label>
                                    <textarea class="form-control" id="about" name="about" rows="5">{{ $user->about }}</textarea>
                                </div>
                                {{-- Location --}}
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control is-valid" id="location" name="location" value="{{ $user->location }}" required>
                                </div>
                                {{-- Skype --}}
                                <div class="form-group">
                                    <label for="skype">Skype</label>
                                    <input type="text" class="form-control" id="skype" name="skype" value="{{ $user->skype }}">
                                </div>
                                {{-- Avatar --}}
                                <div class="card text-center" style="width: 18rem;">
                                    @if($user->avatar)
                                        <img class="card-img-top" src="{{ $user->avatar }}" alt="It's me :)">
                                    @else
                                        <img class="card-img-top" src="images/avatar/default_avatar.jpg" alt="It's me :)">
                                    @endif
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="avatar">Photo</label>
                                            <input type="file" class="form-control-file" id="avatar" name="avatar">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="resetPhoto" name="resetPhoto">
                                                <label class="custom-control-label" for="resetPhoto">Reset to default</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><hr />
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('experiences.index') }}">Experiences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('abilities.index') }}">Abilities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection