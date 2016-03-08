# Stackable PHP Library

This is the Official Stackable API PHP library for getting data from stacks.

## Getting started

Install using Composer

```bash
$ composer install get-stackable/stackable-php
```

Or simple include `src/Stackable.php` file to your project.


## Usage

Make sure to create an account at [http://www.stackable.space](http://www.stackable.space) and setup your Stack and Containers.

To initialize

```php
$stackable = new Stackable('YOUR-STACK-PUBLIC-KEY-HERE');
```

To list all containers

```php
$result = $stackable->getContainers();
print_r($result);
```

To get single containers

```php
$result = $stackable->getContainer('CONTAINER-ID-HERE');
print_r($result);
```

To get all items within single container

```php
$result = $stackable->getContainerItems('CONTAINER-ID-HERE');
print_r($result);
```

To get all items within stack

```php
$result = $stackable->getAllItems();
print_r($result);
```

To get single item

```php
$result = $stackable->getItem('ITEM-ID-HERE');
print_r($result);
```

To create new item

- First initialize, using PRIVATE KEY, (MAKE SURE YOU KEEP THIS KEY SAFE! MOSTLY ON SERVER SIDE)

```php
$stackable = new Stackable('YOUR-STACK-PRIVATE-KEY-HERE');
```

```php
var dataToPost = [
    name => 'John Doe',
    age => 29
];

$result = $stackable->createItem('CONTAINER-ID-HERE', dataToPost);
print_r($result);
```

To update an item

```php
var dataToPost = [
    name => 'John Doe',
    age => 29
];

$result = $stackable->updateItem('ITEM-ID-HERE', dataToPost);
print_r($result);
```

To play with this library: [https://beta.tehplayground.com/D85vaCf8xDxKeb8S](https://beta.tehplayground.com/D85vaCf8xDxKeb8S)

## Todo

- Write tests.
- Test create and update item methods
