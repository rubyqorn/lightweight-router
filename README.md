<h2>What is Lightweight router library?</h2>
<p>
	This is a simple and lightweight library which give you simple representetion
	about routing system.
</p>
<h3>Installation</h3>
<p>
	If you want to use this libary for your web application. You have to install composer
	and use <strong>composer init</strong> for initialize composer.json file. And then you
	can insert in require block <strong>rubyqorn/lightweight-router</strong> and in CLI use
	<strong>composer install</strong> or just prescribe 
</p>
`composer require rubyqorn/lightweight-router`
<h3>Where register and look at my routes?</h3>
<p>
	In the <strong>src/config/routes.php</strong> you can register your routes
	which will be use in your web application. If you don't want to register your
	routes in this file you can require autoload file in index.php
</p>
`require 'vendor/autoload.php';`
<p>and access route class</p>
`use Lightweight\Http\Route;`
<h3>How to use?</h3>
<p>You have four router types:</p>
<ul>
	<li>GET</li>
	<li>POST</li>
	<li>PUT</li>
	<li>DELETE</li>
</ul>
<h4>Example:</h4>
`Route::get('home', 'ExampleController@example');`
<p>If you want to use params in your routes. You can use</p>
<ul>
	<li>{slug}</li>
	<li>{id}</li>
</ul>
<p>
	Just like this
</p>
```Route::post('article/{id}', 'ExampleController@example');```
```Route::delete('article/{slug}', 'ExampleController@example');```

