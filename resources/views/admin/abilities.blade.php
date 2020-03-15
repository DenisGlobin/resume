@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Edit abilities</h2></div>

                    <div class="card-body">
                        @if (session('errors'))
                            <div class="alert alert-error" role="alert">
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    $errors = session()->get('errors');
                                    $messages = "";
                                    ?>
                                    @foreach($errors->all('<p>:message</p>') as $message)
                                        {!! $message !!}
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        {{-- List of a forms for edit abilities --}}
                        @foreach($abilities as $ability)
                            <form method="POST" action="{{ route('abilities.update', ['ability' => $ability]) }}">
                                @csrf
                                @method('PUT')
                                {{-- Name --}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $ability->name }}" required>
                                </div>
                                {{-- Level --}}
                                <div class="form-group">
                                    <label for="customRange2">Level range</label>
                                    <input type="range" class="custom-range" min="0" max="5" id="level" name="level" value="{{ $ability->level }}">
                                </div>
                                {{-- Type --}}
                                <div class="form-group">
                                    <label class="mr-sm-2" for="type">Type of the ability</label>
                                    <select class="custom-select mr-sm-2" id="type" name="type">
                                        <option selected>{{ $ability->type }}</option>
                                        <option value="skill">Skill</option>
                                        <option value="language">Language</option>
                                        <option value="tool">Tool</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>

                            <br>
                            {{-- Delete experience --}}
                            <form method="POST" action="{{ route('abilities.destroy', ['ability' => $ability]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <br><hr />
                        @endforeach

                    </div>
                </div>
                <br>
                {{-- Form for add new experience --}}
                <div class="card">
                    <div class="card-header"><h2>Add new ability</h2></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('abilities.store') }}">
                            @csrf
                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            {{-- Level --}}
                            <div class="form-group">
                                <label for="customRange2">Level range</label>
                                <input type="range" class="custom-range" min="0" max="5" id="level" name="level">
                            </div>
                            {{-- Type --}}
                            <div class="form-group">
                                <label class="mr-sm-2" for="type">Type of the ability</label>
                                <select class="custom-select mr-sm-2" id="type" name="type">
                                    <option value="skill" selected>Skill</option>
                                    <option value="language">Language</option>
                                    <option value="tool">Tool</option>
                                </select>
                            </div>

                            <br><hr />
                            <button class="btn btn-primary" type="submit">Add</button>
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