# Upgrade

[api]: https://docs.dreamapply.com/doku.php?id=api:manual

## 2.x to 3.0

API endpoints removed in APIv5 were removed from the SDK, see [the API docs][api].

## 1.x to 2.0

### Backwards incompatible changes

You are required to do these changes for a successful upgrade.

* Hard dependency on Guzzle was dropped. You need to install a compatible client library.
  * If you use Symfony or Laravel on PHP 7.1 or later, the best choice is `symfony/http-client`:
     ```bash
     composer require symfony/http-client
     ```
  
  * If you use other framework on PHP 7.2 or later, we recommend Guzzle version 7 and later:
    ```bash
    composer require guzzlehttp/guzzle
    ```
  * If you still use PHP 5.x, install `php-http/guzzle6-adapter` or `php-http/curl-client`
* Offer types are now returned according to API v4, see [API docs][api].
* `create()` methods now use creatable model objects instead of param lists:
  ```php
  <?php
  // 1.x:
  $newFlag = $client->applications->flags->create('flag name'));
  
  // 2.0:
  use Dream\Apply\Client\CreatableModels\Flag;
  
  $newFlag = $client->applications->flags->create(new Flag(['name' => 'flag name']));
  // or
  $creatableFlag = new Flag();
  $creatableFlag->setName('flag name');
  $newFlag = $client->applications->flags->create($creatableFlag);
  ```

### Deprecations

Recommended upgrades, old behavior will be removed in a later major version.

* The namespace changed from `Dream\DreamApply\Client` to `Dream\Apply\Client`
  * Both namespaces contain all classes
* Getter names have changed (`get` and `has` prefixes were added):
  * `consent()` -> `getConsent()`
  * `consentExists()` -> `hasConsent()`

  Old methods will continue to work unless they overlap with action calls.

### Behavior changes

* Collections got new methods to retrieve individual records:
  * `get($id)`. The original one, gets a record or throws NotFound
  * `find($id)`. Gets a record or null if not found
  * `lazy($id)`. Does not do a request at all,
    allows access to child collections without an extra request to check for parent existence
  * Array access was an alias for `get()`, now it is an alias for `find()`,
    chains therefore are now allowed:
    ```php
    <?php
    $client->applications[2]?->offers->toArray(); // offers or null
    ```
