# PHP Strict Arrays 

A collection of PHPStan rules to more strictly handle array types. 

## Rules

### No type mutation when adding new elements into an array via assignment shorthand

```
$raspberryJam = new Jam();
$strawberryJelly = new Jelly();

$jams = [$raspberryJame];

// This should fail with as this causes $jams type definition to change from Jam[] to Jam|Jelly[] 
$jams[] = $strawberryJely;
```

`src/NoArrayTypeMutationOnAssignRule.php`

## Run

```
./vendor/bin/phpstan analyse -l 0 examples
```