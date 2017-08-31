# Dream Apply SDK

Dream Apply SDK is a client tool for the [Dream Apply API](http://docs.dreamgroup.info/doku.php?id=api:manual)

## Requirements

PHP 5.5 an later. 

This library uses Guzzle 6.2 and later and Stringy 2.0 and later. Please make sure
that it won't conflict with your dependencies.

## Initialization

```php
<?php
$client = new \Dream\DreamApply\Client\Client('http://instance.dreamapply.com/api/', 'abcdefghijklmnopqrstuvwxyz123456');
```

## Structure

The object hierarchy tries to stay as close to API uri structure as possible

```php
<?php
$client->applicants[1]->documents[2]; // /applications/1/documents/2
$client->applications->offers->types; // /applications/offers/types
```

snake_case in fields and dash-case in urls correspond to the camelCase for objects and properties

```php
<?php
$client->applications[1]->academicTerm; // 'academic_term' from /applications/1
$client->academicTerms;                 // /academic-terms
```

## Work with collections

Collections work like properties of ```$client``` or parent collections/records. Collections implement
array access and are traversable.

```php
<?php
$client->applicants[1];
foreach ($client->applicants as $applicantId => $applicant) {
    print "{$applicantId} email is {$applicant->email}";
}

$client->applicants->count();   // count items (sends HEAD request)
$client->applicants->exists(1); // existence check (sends HEAD request)
$client->applicants->toArray(); // convert to array
```

To use filter, get collection by method call. Please note that record obtaining and
record existence check ignore current filter for the collection

```php
<?php
// filters are required to iterate over applications
$applications = $client->applications(['byCommenceYear' => 2016, 'byStatuses' => 'Submitted']);

$inactive = $applications->filter(['byStatuses' => 'Inactive']); // add or override conditions in filter

$inactive->count();     // count filtered
$inactive->toArray();   // array of filtered items
```

## Records and associations

```php
<?php
// returned fields are properties 
$client->applicants[1]->email;
$client->applicants[1]->name['given'];

// all links between records are automatically resolved
$client->applicants[1]->trackers[1]->assigned; // get field of tracker association
$client->applicants[1]->trackers[1]->tracker;  // get actual tracker from association

// when iterating over collections, object properties are lazy loaded
// please note when calculating API request count
$applications = $client->applications(['byCommenceYear' => 2016, 'byStatuses' => 'Submitted']);

// one request
foreach ($applications as $id => $app) {
    var_dump($app->revised); // 'revised' is returned in collection
}

// collection request + 1 request per object
foreach ($applications as $id => $app) {
    var_dump($app->profile); // 'profile' is not returned in collection, we have to request it
}
```

## Binary records

Some requests like applicant's photo and documents return files. Files are returned as Binary Records
which behave just like normal records but contain predefined fields.

```php
<?php
$photo = $client->applicants[1]->photo;

$photo->name;       // file name
$photo->mime;       // mime type
$photo->size;       // file size
$photo->uploaded;   // file uploaded timestamp
$photo->content;    // file content, an instance of StreamInterface from PSR-7
$photo->expires;    // expiration timestamp (is set for reports)

file_put_contents("/tmp/{$photo->name}", $photo->content);
```

## Special actions

### Creating (POST)

Flags and Trackers can be created in API

```php
<?php
$newTracker = $client->applicants->trackers->create('tracker code', 'notes');
$newFlag    = $client->applications->flags->create('flag name');
```

### Adding association

Flag and Tracker associations can be created in API

```php
<?php
$client->applicants[1]->trackers->add($newTracker);     // add by associated object
$flagAssoc = $client->applications[1]->flags->add(123); // add by associated object id, get assoc instance
```

### Deleting

Flags, Trackers, their associations, and Invoices can be deleted in API

```php
<?php
$client->applications[1]->flags->delete(123);           // delete by id
$client->applications[1]->flags->delete($flagAssoc);    // delete by association object
$client->applications[1]->flags->delete($newFlag);      // delete by associated record
```

### Settable fields

API allows to set some fields like type for offer and task status

```php
<?php
use Dream\DreamApply\Client\Models\Offer;

$client->applications[21]->tasks[4]->setStatus('This is an example status of a task.');
$client->applications[32]->offers[76]->setType(Offer::TYPE_ACCEPTED);
```

## Other special cases

### Simple arrays

Some requests return simple arrays, work with them as with plain php arrays

```php
<?php
$client->applications->statuses;
$client->applications->offers->types;
$client->classificators;
$client->invoices->series;
```

### Reports

Reports object has two methods:

```php
<?php
// list all available reports
$client->reports->available();
// get report as binary record
$client->reports->report('ReportStatus', ['regions' => 1, 'academicTerm' => 1, 'institutions' => 1]);
```
