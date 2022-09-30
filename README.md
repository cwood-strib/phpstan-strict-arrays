# PHP Strict Arrays 

A collection of PHPStan rules to more strictly handle array types. 

## Rules

### No type mutation when adding new elements to an array via assignment shorthand

```php
$raspberryJam = new Jam();
$strawberryJelly = new Jelly();

$jams = [$raspberryJam];

// This should fail as this will cause the `$jams` type definition to change from Jam[] to Jam|Jelly[] 
$jams[] = $strawberryJelly;
```

`src/NoArrayTypeMutationOnAssignRule.php`

## Run

```
./vendor/bin/phpstan analyse -l 0 examples
```
