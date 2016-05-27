@extends('templates.app')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<h1>About</h1>

	<p>
	      The Sakila sample database was designed as a replacement to the
	      <a class="ulink" href="/doc/world-setup/en/" target="_top"><code class="literal">world</code></a>
	      sample database, also provided by Oracle.
	    </p>
	<p>
	      The <code class="literal">world</code> sample database provides a set of
	      tables containing information on the countries and cities of the
	      world and is useful for basic queries, but lacks structures for
	      testing MySQL-specific functionality and new features found in
	      MySQL 5.
	    </p>
	<p>
	      Development of the Sakila sample database began in early 2005.
	      Early designs were based on the database used in the Dell
	      whitepaper
	      <a class="ulink" href="http://www.dell.com/downloads/global/solutions/mysql_apps.pdf" target="_top">Three
	      Approaches to MySQL Applications on Dell PowerEdge
	      Servers</a>.
	    </p>
	<p>
	      Where Dell's sample database was designed to represent an online
	      DVD store, the Sakila sample database is designed to represent a
	      DVD rental store. The Sakila sample database still borrows film
	      and actor names from the Dell sample database.
	    </p>
	<p>
	      Development was accomplished using MySQL Query Browser for schema
	      design, with the tables being populated by a combination of MySQL
	      Query Browser and custom scripts, in addition to contributor
	      efforts (see <a class="xref" href="sakila-acknowledgments.html" title="7&nbsp;Acknowledgments">Section&nbsp;7, “Acknowledgments”</a>).
	    </p>
	<p>
	      After the basic schema was completed, various views, stored
	      routines, and triggers were added to the schema; then the sample
	      data was populated. After a series of review versions, the first
	      official version of the Sakila sample database was released in
	      March 2006.
	    </p>
	    </div>
	    </div>

@stop