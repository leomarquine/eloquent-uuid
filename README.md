# Eloquent UUID
Uuid primary key for Laravel Eloquent Models.

## Installation
Install through Composer
```
composer require marquine/eloquent-uuid
```

## Usage
### Database table
In your migration, create a column for the uuid primary key:
```php
$table->uuid('id')->primary();
```
or
```php
$table->string('id', 32)->primary();
```
If your primary key column name is not `id`, you need to set the model's `$primaryKey` property to the correct name.

### Model
Use the Uuid trait in your model:
```php
<?php

namespace App;

use Marquine\EloquentUuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Uuid;
}
```

## License
Eloquent UUID is licensed under the [MIT license](http://opensource.org/licenses/MIT).
