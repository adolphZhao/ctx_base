# Ctx_base
* [Introduction](#introduction)
* [Installation](#installation)
* [Usage](#usage)
  * [Defining Ctx](#defining-ctx)

## Introduction

Ctx is a PHP service framework for building modular service.  Its modular development make it possible for modularity, extensibility, reusability, maintainability, scalability. It provides a unified interface to local and remote function calling.

Ctx is an MIT-licensed open source project. 

## Installation

### Server Requirements

The Ctx framework has a few basic system requirements:

* PHP >= 5.3

But the Ctx basic module ( like db, cache, config etc. ) has other system requirements, so it's highly recommended you make sure your server meets the following requirements:

* PHP >= 7
* PDO PHP Extension
* CURL PHP Extension

### Installing Ctx

Via composer create-Project

```
composer create-project tree6bee/ctx_base --no-dev
```

## Usage

### Defining Ctx

#### Raw

Define Ctx in your bootstrap file.like this:

```
require DIR . '/ctx_base/vendor/autoload.php';

$ctx = \Ctx\Ctx::getInstance();
```

#### Via Controller

Alternatively, you may also define Ctx in your basic controller file. like this:

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

## Defining Service

