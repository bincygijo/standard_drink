@extends ('layouts.admin')

@section ('page_heading','Documentation')

@section('section')

<h2>Framework details</h2>
<ol>
<li> Laravel 5.1 framework</li>
<li> Bootstrap theme</li>
</ol>

<h2>Installation procedure.</h2>

<ol>
<li> Copy folder to webroot</li>
<li> Open terminal, browse the project folder</li>
<li> run > composer update (here you will need to install composer. Please check the dependencies to run laravel http://laravel.com/docs/5.1#installation)</li>
<li> Create database, edit /.env file, add database details.</li>
<li> Open terminal, run >  php artisan migrate --seed</li>
<li> done</li>
</ol>	
@stop
