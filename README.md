# array-chain

> Get value of nested arrays by chain operation.

## Features

- Chainable
- Getter

## Installation

You can install using [Composer](https://getcomposer.org):

```shell
$ composer require netsan/array-chain
```

## Apis

- ArrayChain::__construct(array $array);
- ArrayChain::make(array $array);
- ArrayChain::has($name);
- ArrayChain::get($name, $default);
- ArrayChain::toArray();
- ArrayChain::__isset($name);
- ArrayChain::__get($name);

## Usage

```php
use Netsan\Helper\ArrayChain as Chain;

$array = [
    'id'   => 1,
    'info' => [
        'name' => 'netsan',
        'sex'  => 'male'
    ]
];

$array = Chain::make($array);
var_dump($array->id, $array->info->name);//int(1) string(6) "netsan"
```

## License

The MIT license applies to array-chain. For the full copyright and license information, please view the
[LICENSE](https://github.com/netsan/array-chain/blob/master/LICENSE) file distributed with this source code.
