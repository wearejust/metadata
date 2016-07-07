[![Build Status](https://travis-ci.org/wearejust/metadata.svg?branch=master)](https://travis-ci.org/wearejust/metadata)

# MetaData

This package allow you to simplify the process of adding meta tags to your HTML.
It basically allows you to use a simple to use API.

## Installlation

## Laravel 5 integration

This package ships with a Laravel 5 Service Provider to simplify the process. Also a ViewComposer is registered automatically so that there always is a variable ```$metaData``` in the in the config specified views

app.php
```php
'providers' => [
    ...
    ...
    Just\MetaData\Laravel\MetaDataServiceProvider::class,
]

'aliases' => [
    ...
    ...
    'MetaData'  => Just\MetaData\Laravel\Facades\MetaData::class,
]
```

You can publish the (default) config by fire the following command

```bash
php artisan vendor:publish --provider="Just\MetaData\Laravel\MetaDataServiceProvider"
```

### Example

```php
Route::get('/', function (Just\MetaData\MetaDataWrapper $manager) {
    ...
    $images = [];
    
    $manager->fromData('Title', 'Desription', $images);
    //OR
    $object = new SometingWithFollowingInterface(MetaDataInterface);
    $manager->fromInterface($object);

    // You may also use the Facade
    $object = MetaData::fromInterface($object);

    return view('welcome');
});
```


### API of the $metaData object in view
```php
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return array
     */
    public function getCustomContent();

    /**
     * @return string
     */
    public function getBaseUrl();

    /**
     * @return string
     */
    public function getCurrentUrl();
```


