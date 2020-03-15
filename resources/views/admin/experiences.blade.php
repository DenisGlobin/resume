@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Edit experience</h2></div>

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
                        {{-- List of a forms for edit experiences --}}
                        @foreach($experiences as $experience)
                            <form method="POST" action="{{ route('experiences.update', ['experience' => $experience]) }}">
                                @csrf
                                @method('PUT')
                                {{-- Name --}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $experience->name }}" required>
                                </div>
                                {{-- Title --}}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $experience->title }}" required>
                                </div>
                                {{-- Text about --}}
                                <div class="form-group">
                                    <label for="text">About experience</label>
                                    <textarea class="form-control" id="text" name="text" rows="5">{{ $experience->text }}</textarea>
                                </div>
                                {{-- Years --}}
                                <div class="form-group">
                                    <label for="years">Years</label>
                                    <input type="text" class="form-control" id="years" name="years" value="{{ $experience->years }}" required>
                                </div>
                                {{-- Location --}}
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ $experience->location }}" required>
                                </div>
                                {{-- Type --}}
                                <div class="form-group">
                                    <label class="mr-sm-2" for="type">Type of the experience</label>
                                    <select class="custom-select mr-sm-2" id="type" name="type">
                                        <option selected>{{ $experience->type }}</option>
                                        <option value="career">Career</option>
                                        <option value="education">Education</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>

                            <br>
                            {{-- Delete experience --}}
                            <form method="POST" action="{{ route('experiences.destroy', ['experience' => $experience]) }}">
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
                    <div class="card-header"><h2>Add new experience</h2></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('experiences.store') }}">
                            @csrf
                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            {{-- Text about --}}
                            <div class="form-group">
                                <label for="text">About experience</label>
                                <textarea class="form-control" id="text" name="text" rows="5"></textarea>
                            </div>
                            {{-- Years --}}
                            <div class="form-group">
                                <label for="years">Years</label>
                                <input type="text" class="form-control" id="years" name="years" required>
                            </div>
                            {{-- Location --}}
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            {{-- Type --}}
                            <div class="form-group">
                                <label class="mr-sm-2" for="type">Type of the experience</label>
                                <select class="custom-select mr-sm-2" id="type" name="type">
                                    <option value="career" selected>Career</option>
                                    <option value="education">Education</option>
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