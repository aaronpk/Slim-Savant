## Usage

### Setup

In your `public/index.php`, add this line:

```php
\Slim\Savant\init();
```

### Render

In your controller, you can use the `render` helper function. The helper function
assumes your master layout is called `views/layout.php`.

In PHP 5.6, you can alias the render function:

```php
use function \Slim\Savant\render;

render('index');
```

Below 5.6, you'll need to do the following:

```php
use \Slim\Savant;

Savant\render('index');
```

### Partials

```php
Savant\partial('foo');
```

