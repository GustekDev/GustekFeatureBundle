GustekFeatureBundle
========================

Work in progress

This bundle allows for easy use of feature flags in your project.

Installation
========================

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require <package-name>
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new <vendor>\<bundle-name>\<bundle-long-name>(),
        );

        // ...
    }

    // ...
}
```

Usage
===================

Configuration
-----------------

```yaml

    gustek_feature:
      settings: config
      features:
        some_feature:
          toggles:
            global:
              enabled: [true]
        other_feature:
          toggles:
            global:
              enabled: [false]
            role:
              roles [ROLE_BETA]

```

In controller
------------------

```php

    $feature = $this->get('gustek.feature.some_feature');
    if ($feature->isEnabled()) {
        //feature enabled
    }

```

In Twig
-------------------

```twig

    {% if gustek_feature('some_feature') %}
        Feature enabled
    {% endif %}

```


Toggles
==================

List of toggles to implement

<dl>
    <dt>Global</dt>
    <dd>Is toggle enabled globally or nor</dd>

    <dt>Role</td>
    <dd>Feature enabled for users with role(s) specified</dd>

    <dt>Date</dt>
    <dd>Feature enabled in period of time</dd>

    <dt>Dependent<dt>
    <dd>Feature depends on another feature being enabled</dd>

</dl>

Settings
===================

By default setting for toggles can be specified in config.yml

There will be more options like database in future.

Creating custom toggles
=======================

Create a class implementing FeatureToggleInterface

define service

```xml

    <service id="feature.toggle.custom" class="Your\Bundle\FeatureToggle\CustomToggle" scope="prototype">
        <tag name="gustek.feature.toggle" alias="customToggle" />
    </service>

```
