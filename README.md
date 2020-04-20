### Usage

#### Composer
First add the following to your `composer.json` file:
```json
"require": {
  "srag/requireddata": ">=0.1.0"
},
```
And run a `composer install`.

If you deliver your plugin, the plugin has it's own copy of this library and the user doesn't need to install the library.

Tip: Because of multiple autoloaders of plugins, it could be, that different versions of this library exists and suddenly your plugin use an older or a newer version of an other plugin!

So I recommand to use [srag/librariesnamespacechanger](https://packagist.org/packages/srag/librariesnamespacechanger) in your plugin.

#### PHP 7.0
You can use this library with PHP 7.0 by using the `PHP72Backport` from [srag/librariesnamespacechanger](https://packagist.org/packages/srag/librariesnamespacechanger)

#### Using trait
Your class in this you want to use RequiredData needs to use the trait `RequiredDataTrait`
```php
...
use srag\RequiredData\x\Utils\RequiredDataTrait;
...
class x {
...
use RequiredDataTrait;
...
```

#### RequiredData ActiveRecord
First you need to init the `RequiredData` active record classes with your own table name prefix. Please add this very early in your plugin code
```php
self::requiredData()->configs()->withTableNamePrefix(ilXPlugin::PLUGIN_ID)->withPlugin(self::plugin());
```

Add an update step to your `dbupdate.php`
```php
...
<#x>
<?php
\srag\RequiredData\x\Repository::getInstance()->installTables();
?>
```

and not forget to add an uninstaller step in your plugin class too
```php
self::requiredData()->configs()->dropTables();
```

#### Ctrl classes
```php
...
/**
 * ...
 *
 * @ilCtrl_isCalledBy srag\RequiredData\x\Field\FieldsCtrl: x
 */
class x
{
    ...
}
```

```php
...
/**
 * ...
 *
 * @ilCtrl_isCalledBy srag\Plugins\x\Field\FillCtrl: x
 */
class FillCtrl extends AbstractFillCtrl
{
    ...
    const PLUGIN_CLASS_NAME = ilXPlugin::class;
    ...
    /**
     * @inheritDoc
     */
    protected function back() : void
    {
        ...
    }


    /**
     * @inheritDoc
     */
    protected function cancel() : void
    {
        ...
    }

    ...
}
```

#### Languages
Expand you plugin class for installing languages of the library to your plugin
```php
...
	/**
     * @inheritDoc
     */
    public function updateLanguages(/*?array*/ $a_lang_keys = null):void {
		parent::updateLanguages($a_lang_keys);

		self::requiredData()->configs()->installLanguages();
	}
...
```

### Own fields
Extend `AbstractField`, `AbstractFieldFormBuilder` and `AbstractFillField` (In same folder).

You need to implement a new language variable `required_data_type_x` in your plugin language file.

But you don't need to add an own update or uninstaller step.

Add your `AbstractField` very early in your plugin code (After you call `withTableNamePrefix`)
```php
self::requiredData()->fields()->factory()->addClass(XField::class);
```

#### Deliver multi search select with own static options
Just extends the `StaticMultiSearchSelect` classes

#### Deliver value which user can't change
Just extends the `DynamicValue` classes

### Requirements
* ILIAS 5.4 or ILIAS 6
* PHP >=7.2

### Adjustment suggestions
* External users can report suggestions and bugs at https://plugins.studer-raimann.ch/goto.php?target=uihk_srsu_LREQDATA
* Adjustment suggestions by pull requests via github
* Customer of studer + raimann ag: 
	* Adjustment suggestions which are not yet worked out in detail by Jira tasks under https://jira.studer-raimann.ch/projects/LREQDATA
	* Bug reports under https://jira.studer-raimann.ch/projects/LREQDATA
