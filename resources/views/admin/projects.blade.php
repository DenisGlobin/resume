@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Edit projects</h2></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- List of a forms for edit experiences --}}
                        @foreach($projects as $project)
                            <form class="formProject" method="POST" action="{{ route('projects.update', ['project' => $project]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- Title --}}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
                                </div>
                                {{-- Subtitle --}}
                                <div class="form-group">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $project->subtitle }}">
                                </div>
                                {{-- Tags --}}
                                <div class="form-group">
                                    <label for="tags" id="tagsLabel">Tags</label>
                                    @foreach(json_decode($project->tags) as $tag)
                                        <button type='button' class='btn btn-light btn-sm fade show' onclick='deleteTag(event)' value="{{ $tag }}">{{ $tag }}
                                            <span class='badge badge-secondary' aria-hidden='true'>&times;</span>
                                        </button>
                                    @endforeach
                                    <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter new tag">
                                    <button class="btn btn-outline-secondary" type="button" id="addTag">Add tag</button>
                                </div>
                                {{-- Site Url --}}
                                <div class="form-group">
                                    <label for="siteUrl">Site Url</label>
                                    <input type="text" class="form-control" id="siteUrl" name="siteUrl" value="{{ $project->site_url }}">
                                </div>
                                {{-- Github Url --}}
                                <div class="form-group">
                                    <label for="githubUrl">Github Url</label>
                                    <input type="text" class="form-control" id="githubUrl" name="githubUrl" value="{{ $project->github_url }}">
                                </div>
                                {{-- Is test task? --}}
                                <div class="custom-control custom-checkbox">
                                    @if($project->is_test_task)
                                        <input type="checkbox" class="custom-control-input" id="testTask" name="testTask" checked>
                                    @else
                                        <input type="checkbox" class="custom-control-input" id="testTask" name="testTask">
                                    @endif
                                    <label class="custom-control-label" for="testTask">This is test task?</label>
                                </div>
                                {{-- Thumbnail --}}
                                <div class="card text-center" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ $project->thumbnail }}" alt="Thumbnail">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail</label>
                                            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="resetThumb" name="resetThumb">
                                                <label class="custom-control-label" for="resetThumb">Reset to default</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                            <br><hr />
                        @endforeach

                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header"><h2>Add new project</h2></div>
                    <div class="card-body">
                        {{-- Form for add new project --}}
                        <form class="formProject" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            {{-- Subtitle --}}
                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle">
                            </div>
                            {{-- Tags --}}
                            <div class="form-group">
                                <label for="tags" id="tagsLabel">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter new tag">
                                <button class="btn btn-outline-secondary" type="button">Add tag</button>
                            </div>
                            {{-- Site Url --}}
                            <div class="form-group">
                                <label for="siteUrl">Site Url</label>
                                <input type="text" class="form-control" id="siteUrl" name="siteUrl">
                            </div>
                            {{-- Github Url --}}
                            <div class="form-group">
                                <label for="githubUrl">Github Url</label>
                                <input type="text" class="form-control" id="githubUrl" name="githubUrl">
                            </div>
                            {{-- Is test task? --}}
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="testTask" name="testTask">
                                <label class="custom-control-label" for="testTask">This is test task?</label>
                            </div>
                            {{-- Thumbnail --}}
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail</label>
                                        <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                                    </div>
                                </div>
                            </div>

                            <br><hr />
                            <button class="btn btn-primary" type="submit">Add new project</button>
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

@section('js')
    <script>
        // Add Tag
        $(function () {
            $("button.btn-outline-secondary").on('click', function () {
                let tag = $("input#tags").val();
                if (!!tag) {
                    $("label#tagsLabel").after("" +
                        "<button type='button' class='btn btn-light btn-sm fade show' onclick='deleteTag(event)' value='" + tag + "'>" +
                        tag + "<span class='badge badge-secondary' aria-hidden='true'>&times;</span>\n" +
                        "</button>\n");
                    $("input#tags").val('');
                }
            })
        });
        // Delete Tag
        function deleteTag(event) {
            let domElement =$(event.currentTarget);
            domElement.remove();
        }
        // Add tags to post's data
        // formProject.onsubmit = (e) => {
        $('body').on('submit', '.formProject', function(e) {
            let form = $(this);
            // Delete add tags field
            let data = new FormData(e.target);
            data.delete('tags');
            // Add tags to form
            $.each($("button.fade"), function () {
                $(form).append('<input type="hidden" name="tags[]" value="'+$(this).val()+'">');
            });
        // }
        });
    </script>
@endsection