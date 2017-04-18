# ctx_base
build the context service project.

## Introduction



## installation

```
composer create-project tree6bee/ctx_base --no-dev
```

## Usage

### Defining Ctx

#### Via Controller
```
require __DIR__ . '/ctx_base/vendor/autoload.php';

use Ctx\Ctx;

class Controller {
  	/**
     * @var Ctx
     */
    protected $ctx;

    public function __construct()
    {
    	$this->ctx = Ctx::getInstance();
    }
}
```

#### Raw

```
require DIR . '/ctx_base/vendor/autoload.php';

$ctx = \Ctx\Ctx::getInstance();
```

## Defining Service