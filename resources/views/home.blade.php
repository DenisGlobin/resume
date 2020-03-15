
<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-language" content="en" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="author" content="{{ $user->name }}" />
    <meta name="description" content="I'm Denis Globin, a webdeveloper." />
    <meta name="keywords" content="Denis Globin, Interactive Resume, PHP programmer, Web developer, Interactive CV, Laravel, PHP, MySQL, PostgreSQL, OOP" />
    <meta name="robots" content="index, follow" />

    <title>Denis Globin - Web Developer - Interactive Resume</title>

    <!-- Bootstrap core CSS -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <!-- <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" /> -->

    <!--[if lt IE 9]>
    <script src="/view/js/html5shiv.js"></script>
    <script src="/view/js/respond.min.js"></script>
    <![endif]-->

</head>
<body data-spy="scroll" data-target="#navbar-example">


<div id="top" class="jumbotron parallax-mountain-1" data-position="center center">
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p class="lead">Interactive resume</p>
    </div>

    <div class="overlay">
        <div class="parallax">
            <div class="parallax-mountain parallax-mountain-2"></div>
            <div class="parallax-mountain parallax-mountain-3"></div>
            <div class="parallax-fog"></div>
        </div>
    </div>

    <a href="#profile" class="scroll-down">
        <span class="glyphicon glyphicon-chevron-down"></span>
    </a>
</div>

<nav class="navbar navbar-default" id="navbar-example" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#profile">Profile</a></li>
            <li><a href="#experiences">Experiences</a></li>
            <li><a href="#abilities">Abilities</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

<div class="background-white">
    <div id="profile" class="container">
        <h2>Profile</h2>
        <p class="lead">I&#039;m a creative PHP/Laravel webdeveloper</p>

        <hr />

        <div class="row">
            <div class="col-md-4">
                <h3>About me</h3>
                <p>
                    {{ $user->about }}
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-thumbnail" width="246" height="246" src="{{ $user->avatar }}" alt="{{ $user->name }}">
            </div>
            <div class="col-md-4">
                <h3>Details</h3>
                <p>
                    <strong>Name:</strong><br />
                    {{ $user->name }}<br />
                    <strong>Age:</strong><br />
                    {{ $user->age }} years<br />
                    <strong>Location:</strong><br />
                    {{ $user->location }}
                </p>
            </div>
        </div>

    </div>
</div>

<div id="experiences" class="container">
    <h2>Experiences</h2>
    <p class="lead">
        &ldquo;Protons give an atom its identity, electrons its personality.&rdquo;<br />- Bill Bryson, A short history of nearly everything
    </p>
    <hr />

    <h3>Educations</h3>

    <div class="experiences">

        @foreach($educations as $education)
            <div class="experience row">
                <div class="col-md-4">
                    <h4>{{ $education->name }}</h4>
                    <p class="experience-period">
                        {{ $education->years }}
                    </p>
                </div>
                <div class="col-md-8">
                    <p>
                        <strong>{{ $education->title }}</strong>
                        <span class="hidden-phone">{{ $education->text }}</span>
                        <span class="experience-details">
                            <span class="location">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                {{ $education->location }}
                            </span>
                        </span>
                    </p>
                </div>
            </div>
        @endforeach

    </div>
    <hr />

    <h3>Careers</h3>

    <div class="experiences">

        @foreach($careers as $career)
            <div class="experience row">
                <div class="col-md-4">
                    <h4>{{ $career->name }}</h4>
                    <p class="experience-period">
                        {{ $career->years }}
                    </p>
                </div>
                <div class="col-md-8">
                    <p>
                        <strong>{{ $career->title }}</strong>
                        <span class="hidden-phone">{{ $career->text }}</span>
                        <span class="experience-details">
                            <span class="location">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                {{ $career->location }}
                            </span>
                        </span>
                    </p>
                </div>
            </div>
        @endforeach

    </div>

</div>

<div class="background-white">
    <div id="abilities" class="container">
        <h2>Abilities</h2>
        <p class="lead">
            &ldquo;Life without knowledge is death in disguise.&rdquo;<br />- Talib Kweli
        </p>
        <hr />

        <h3>Skills</h3>

        <div class="row">
            <div class="col-md-6">
                <ul class="no-bullets">
                    @php
                        $index = 1;
                    @endphp
                    @foreach($skills as $skill)
                        {{-- Split the skills for two columns --}}
                        @if($index > ($skills->count()/2))
                            </ul>
                            </div>
                            <div class="col-md-6">
                            <ul class="no-bullets">
                        @endif
                        <li>
                            <span class="ability-title">{{ $skill->name }}</span>
                            <span class="ability-score">
                                @php
                                    $filled = 0;
                                @endphp
                                {{-- Draw filled stars --}}
                                @while ($filled < $skill->level)
                                    <span class="glyphicon glyphicon-star filled"></span>
                                    @php
                                        $filled++;
                                    @endphp
                                @endwhile
                                {{-- Draw non filled stars --}}
                                @while ($filled < 5)
                                    <span class="glyphicon glyphicon-star "></span>
                                    @php
                                        $filled++;
                                    @endphp
                                @endwhile
                            </span>
                        </li>
                        @php
                            $index++;
                        @endphp
                    @endforeach
                </ul>
            </div>
        </div>

        {{--<div class="text-center project-referal">--}}
            {{--<p>This project is build on a custom made PHP framework.</p>--}}
            {{--<a href="https://github.com/pascalvgemert/resume" class="btn btn-primary" target="_blank">See project on Github</a>--}}
        {{--</div>--}}
        <hr />

        <h3>Languages</h3>

        <div class="row">
            <div class="col-md-6">
                <ul class="no-bullets">

                    @php
                        $index = 1;
                    @endphp
                    @foreach($languages as $language)
                        @if($index > ($languages->count()/2))
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="no-bullets">
                        @endif
                    <li>
                        <span class="ability-title">{{ $language->name }}</span>
                        <span class="ability-score">
                                @php
                                    $filled = 0;
                                @endphp
                            @while ($filled < $language->level)
                                <span class="glyphicon glyphicon-star filled"></span>
                                @php
                                    $filled++;
                                @endphp
                            @endwhile
                            @while ($filled < 5)
                                <span class="glyphicon glyphicon-star "></span>
                                @php
                                    $filled++;
                                @endphp
                            @endwhile
                            </span>
                    </li>
                    @php
                        $index++;
                    @endphp
                    @endforeach

                </ul>
            </div>
        </div>
        <hr />

        <h3>Tools</h3>

        <div class="row">
            <div class="col-md-6">
                <ul class="no-bullets">

                    @php
                        $index = 1;
                    @endphp
                    @foreach($tools as $tool)
                        @if($index > ($tools->count()/2))
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="no-bullets">
                        @endif
                    <li>
                        <span class="ability-title">{{ $tool->name }}</span>
                        <span class="ability-score">
                                @php
                                    $filled = 0;
                                @endphp
                            @while ($filled < $tool->level)
                                <span class="glyphicon glyphicon-star filled"></span>
                                @php
                                    $filled++;
                                @endphp
                            @endwhile
                            @while ($filled < 5)
                                <span class="glyphicon glyphicon-star "></span>
                                @php
                                    $filled++;
                                @endphp
                            @endwhile
                            </span>
                    </li>
                    @php
                        $index++;
                    @endphp
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

<div id="projects" class="container">
    <h2>Projects</h2>
    <p class="lead">
        &ldquo;You can do anything you set your mind to.&rdquo;<br />- Benjamin Franklin
    </p>
    <hr />

    <div class="row">

        @foreach($projects as $project)
            <div class="col-md-6 col-sm-12 col-xs-12">
                <figure class="effect">
                    <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" />

                    <figcaption>
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->subtitle }}</p>
                        <p>
                            <strong>Tags:</strong> <br />
                            @foreach(json_decode($project->tags) as $tag)
                                {{ $tag }},
                            @endforeach
                        </p>
                        @if($project->site_url)
                            <a href="{{ $project->site_url }}" target="_blank">View more</a>
                            <span class="icon">
                            <span class="glyphicon glyphicon-new-window"></span>
                            </span>
                        @endif
                    </figcaption>
                </figure>
                @if($project->github_url)
                    <div class="text-center project-referal">
                        <a href="{{ $project->github_url }}" class="btn btn-primary" target="_blank">See project on Github</a>
                    </div>
                @endif
            </div>
        @endforeach

    </div>

</div>

<div class="background-gray">
    <div id="contact" class="container">
        <h2>Contact</h2>
        <p class="lead">
            &ldquo;If I had asked people what they wanted, they would have said faster horses. &rdquo;<br />- Henry Ford
        </p>
        <hr />

        <div class="row">
            <div class="col-md-6">
                <ul class="no-bullets">
                    <li>
                        <a href="javascript:void(0);">
                            <span class="icon icon-skype"></span>
                            {{ $user->skype }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="no-bullets">
                    <li>
                        <a href="mailto:globin.denis@gmail.com">
                            <span class="icon icon-email"></span>
                            {{ $user->email }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr />

    </div>
</div>

<div class="modal fade" id="upgrade-dialog" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your browser is out of date</h4>
            </div>
            <div class="modal-body">
                <p>To get the best possible experience using our site we recommend that you upgrade to a modern web browser. To download a newer web browser click on the Upgrade button.</p>
            </div>
            <div class="modal-footer">
                <a href="http://browsehappy.com/" target="_blank" class="btn btn-primary">Upgrade</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>