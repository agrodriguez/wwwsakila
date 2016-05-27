@extends('templates.app')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
<div class="title">Laravel 5</div>

<h1>Home page for {{ $name }}</h1>

<p>
      The Sakila sample database was initially developed by Mike
      Hillyer, a former member of the MySQL AB documentation team, and
      is intended to provide a standard schema that can be used for
      examples in books, tutorials, articles, samples, and so forth.
      Sakila sample database also serves to highlight the latest
      features of MySQL such as Views, Stored Procedures, and Triggers.
    </p>
<p>
      Additional information on the Sakila sample database and its
      usage can be found through the
      <a class="ulink" href="http://forums.mysql.com/list.php?121" target="_top">MySQL
      forums</a>.
    </p>
<p>
      The Sakila sample database is the result of support and feedback
      from the MySQL user community and feedback and user input is
      always appreciated. Please direct all feedback using the
      http://www.mysql.com/company/contact/. For bug reports, use
      <a class="ulink" href="http://bugs.mysql.com" target="_top">MySQL Bugs</a>.
    </p>
    </div>
    </div>

@stop