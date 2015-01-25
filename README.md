# Rule

A simple Laravel package that provides an expressive alternative to building validation rules. It uses what you already know about validation with Laravel and builds on top of that.

Instead of this:

```php
$rules = array(
    'username' => 'required|alpha',
    'email' => 'required|email'
);
```

You'll be writing:

```php
Rule::add('username')->required()->alpha();
Rule::add('email')->required()->email();

$rules = Rule::get();
```

Which method is more easy to read or write is a matter of personal preference, so I'm not taking sides. However, using `Rule` offers two main advantages:

1. Misstyped rule names, non existing rules or missing arguments will throw fatal errors. In contrast, Laravel's rules will fail silently and provide no information when you write 'reqiured' instead of 'required'.
2. IDE suggestions and auto complete. Every rule is a real, documented function that your IDE can easily pick up. Coupled with [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper), you'll rarely need to open the Validator docs.

## Installation

1. Add the package to your composer.json file and run `composer update`:

```json
{
    "require": {
        "fadion/rule": "~1.0"
    }
}
```

2. Add `Fadion\Rule\RuleServiceProvider` to your `app/config/app.php` file, inside the `providers` array.

3. Add a new alias: `'Rule' => 'Fadion\Rule\Facades\Rule'` to your `app/config/app.php` file, inside the `aliases` array.

## Usage

If you've used Laravel's Validator, then you already know how to use `Rule`. It just changes the way you write rules, but the validation process remains exactly the same.

**A complete validation example**

```php
$inputs = Input::all();

Rule::add('username')->required()->alpha();
Rule::add('email')->required()->email();

$validator = Validator::make($inputs, Rule::get());

if ($validator->fails())
{
    Return::back()->withInput()->withErrors($validator);
}
```

**Rules with parameters**

Rule parameters are handled as simple method arguments. There can be one or more arguments, depending on the rule and some can be arrays too (like: `in`, `not_in`, `mimes`, etc.).

```php
Rule::add('date')->date_format('mm/dd/YYYY');
Rule::add('age')->between(5, 15);
Rule::add('role')->in(['Admin', 'Moderator', 'Editor']);
```

**Exists and Unique**

`exists` and `unique` are special cases, as they have a few defined and documented arguments, as well as dynamic ones for the where clauses.

```php
Rule::add('username')->exists('users');
Rule::add('username')->exists('users', 'name');
Rule::add('username')->exists('users', 'name', 'id', 10);


Rule::add('email')->unique('users');
Rule::add('email')->unique('users', 'email_address', 10);
Rule::add('email')->unique('users', 'email_address', 10, 'account_id', 1);
```

**Custom rules**

`Rule` handles custom rules in the same way as the predefined ones. It even accepts parameters.

```php
Validator::extend('foo', function($attribute, $value, $parameters)
{
    return $value == 'foo';
});

Rule::add('name')->required()->foo();
```

**Array rule**

Laravel's rule for validating an input as `array` is renamed to `is_array()`. The word "array" is reserved in PHP and can't be used as a method name, hence the rename.

```php
Rule::add('languages')->is_array();
```

**Method names**

Methods can be written as either snake_case (as Laravel accepts rule names) or as camelCase (psr-2). Both cases behave exactly the same, so use whatever feels better.

So, the methods below are equivalent:

```php
Rule::add('date')->date_format('Y-m-d');
Rule::add('date')->dateFormat('Y-m-d');

Rule::add('username')->alpha_dash();
Rule::add('username')->alphaDash();
```

## Attribute names

Laravel has an option to alias input names with custom attributes, as a way to build better error messages. `Rule` provides an easy way to create them.

```php
Rule::add('name', 'Your name')->required();
Rule::add('email', 'Your email')->required()->email();

$validator = Validator::make(Input::all(), Rule::get());

// Apply attributes
$validator->setAttributeNames(Rule::getAttributes());
```

## Messages

There's no way that you start writing expressive rules, but keep messages as arrays. `Rule` will handle those too in a very elegant and easy to use way. Just add a `message()` method after the rule:

```php
Rule::add('email')
    ->required()->message("Email shouldn't be empty.")
    ->email()->message("Email appears to be invalid.");

Rule::add('password')
    ->required()->message("Password shouldn't be empty.")
    ->between(5, 15)->message("Make that password more secure!");

$rules = Rule::get();
$messages = Rule::getMessages();
```
