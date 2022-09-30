# PHPStan Strict Arrays 

A collection of [PHPStan](https://phpstan.org/) rules to more strictly handle array types. 

## Rules

### No type definition change when adding new elements to an array via assignment shorthand

```php
$raspberryJam = new Jam();
$strawberryJelly = new Jelly();

$jams = [$raspberryJam];

// This should fail.
// It would cause the `$jams` type definition to change from Jam[] to Jam|Jelly[] 
$jams[] = $strawberryJelly;
```

`src/NoArrayTypeMutationOnAssignRule.php`

## Run

```
./vendor/bin/phpstan analyse -l 0 examples
```

## TODO

- Handle `array_push`
- Check `array_merge`
- Check spread operator merges