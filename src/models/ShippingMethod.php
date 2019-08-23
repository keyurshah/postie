<?php
namespace verbb\postie\models;

use Craft;
use craft\base\Model;
use craft\helpers\UrlHelper;

use craft\commerce\base\ShippingMethod as BaseShippingMethod;

class ShippingMethod extends BaseShippingMethod
{
    // Properties
    // =========================================================================

    public $provider;
    public $rate;
    public $rateOptions;
    public $shippingMethodCategories;


    // Public Methods
    // =========================================================================

    public function getType(): string
    {
        return $this->provider->getName();
    }

    public function getId()
    {
        return null;
    }

    public function getName(): string
    {
        return (string)$this->name;
    }

    public function getHandle(): string
    {
        return (string)$this->handle;
    }

    public function getShippingRules(): array
    {
        $shippingRule = new ShippingRule();
        $shippingRule->description = $this->name;
        $shippingRule->baseRate = $this->rate;
        $shippingRule->provider = $this->provider;
        $shippingRule->shippingMethod = $this;
        $shippingRule->options = $this->rateOptions;

        // Drop any settings for the provider, these are returned with calculation requests
        if (property_exists($shippingRule->provider, 'settings')) {
            $shippingRule->provider->settings = [];
        }

        return [$shippingRule];
    }

    public function getIsEnabled(): bool
    {
        return (bool)$this->enabled && isset($this->rate);
    }

    public function getCpEditUrl(): string
    {
        return UrlHelper::cpUrl('postie/settings/shipping-methods/' . $this->provider->getHandle() . '/' . $this->getHandle());
    }
}
