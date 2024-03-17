![259536673-e241b819-1178-48c0-945e-94b1e755b689](https://github.com/strberry/framework/assets/129489839/3fbf51c0-12af-455c-9f60-d3ce56e8587f)
<div align="center">
	<i>Strawberry is a lightweight approach to make working with PHP less of a pain in the ass.</i>
</div>

## 🚀 Quick Setup
### ✅ Requirements
- Written for PHP 8 (older versions are untested)
- Apache web server allowing .htaccess files
### ⚙️ Installation
```bash
git clone https://github.com/strberry/framework.git
```
### 🚀 Deployment
```bash
docker compose up -d
```
If you do not want to use docker, move the `src/` directory to your web server's root

### 👨‍💻 Getting Started
#### Creating your first controller
##### **`src/controllers/HelloWorldController.php`**
```php
<?php

class HelloController extends Controller
{

    public function world(): string
    {
        return $this->respond('Hello, world!');
    }

}
```
#### Mapping a route to a controller
###### **`src/routes.php`**
```php
<?php

$routes = [
	...

	'/'  => [HelloWorldController::class, 'world'],

	...
];

```
#### Testing
```
user@box:/var/www/html$ curl http://localhost/
Hello World!
```
### Installing optional features
#### List of official extensions
1. [strawberry-io](https://github.com/elderguardian/strawberry-io): Simplifies query string input and json output
2. [strawberry-di](https://github.com/elderguardian/strawberry-di): DI Container for strawberry.
3. [strawberry-view](https://github.com/elderguardian/strawberry-view): Primitive template engine that supports components
