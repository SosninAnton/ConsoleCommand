# ConsoleCommand



**Note:** ```i@sosnin-web.ru``` ```consolecommand``` ```library for handling input arguments and parameters for custom uesr commands``` 



## Install

Via Composer

``` bash
$ composer require sosninanton/consolecommand
```

## Usage

``` php
$argvCommandHandler = new ArgvCommandHandler();
$argvCommandHandler->registerCommand($command)
                   ->registerCommand($anotherCommand);
                   
                   
echo $argvCommandHandler->handle();                   
```


## Testing

``` bash
$ composer test
```



