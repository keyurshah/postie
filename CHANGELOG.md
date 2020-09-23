# Changelog

## 2.3.0 - 2020-08-09

### Changed
- Now requires Commerce 3.2+ and Craft 3.5+.

### Fixed
- Fixed error with Commerce 3.2.

## 2.2.9 - 2020-08-04

### Changed
- Ensure the lowest amount is always used for Fedex amounts.

## 2.2.8 - 2020-07-26

### Fixed
- Fix USPS error when a postcode isn’t set on the shipping address.

## 2.2.7 - 2020-07-14

### Fixed
- Fix UPS error for carts that have no shipping country selected.

## 2.2.6 - 2020-07-10

### Fixed
- Fix UPS throwing an error when the recipient address is from non-US countries.

## 2.2.5 - 2020-06-17

#### Fixed
- Fix error in UPS provider related to SurePost.

## 2.2.4 - 2020-06-16

#### Fixed
- Fix UPS SurePost exception preventing additional rates from being fetched. (thanks @Mosnar).

## 2.2.3 - 2020-05-26

### Fixed
- Add special-case for completed orders, and fetching non-live-rate shipping methods. This allows the correct use of `order.shippingMethod.name`. Please note that calling this for completed orders will report all Postie-provided shipping method costs as 0. As such, use the shipping costs recorded on the order (`order.totalShippingCost()`).
- Fix errors for console or queue requests.

## 2.2.2 - 2020-05-15

### Added
- Provide local cache for Australia Post countries API call (when the resource is offline).

## 2.2.1 - 2020-05-10

### Fixed
- Ensure we check for cached rates when manualFetchRates is turned on. Otherwise, the shipping method won't save on cart, or persist on page load.
- Remove duplicate cakephp/utility composer package. (thanks @codebycliff).
- Fix saving shipping method settings not working.

## 2.2.0 - 2020-05-03

### Added
- Added `manualFetchRates` config option, to allow you to manage manually fetching rates on-demand. Read the [docs](https://verbb.io/craft-plugins/postie/docs/setup-configuration/manually-fetching-rates) for more info.

### Changed
- Greatly improve caching mechanism for initial requests to providers. This should result in faster rates-fetching.
- Provider function `getSignature` is now public.

## 2.1.4 - 2020-04-16

### Fixed
- Fix logging error `Call to undefined method setFileLogging()`.

## 2.1.3 - 2020-04-15

### Added
- Add support for UPS “Sure Post”.

### Changed
- File logging now checks if the overall Craft app uses file logging.
- Log files now only include `GET` and `POST` additional variables.

## 2.1.2 - 2020-03-17

### Fixed
- Canada Post - Fix incorrect URL for live requests.
- Fix styling issues for provider markup settings.

## 2.1.1 - 2020-01-18

### Added
- Add `ShippingMethod::EVENT_MODIFY_SHIPPING_RULE`. See [docs](https://verbb.io/craft-plugins/postie/docs/developers/events).

## 2.1.0 - 2020-01-09

### Added
- Add TNT Australia provider.
- Add 2- and 3-day Priority options to USPS. (thanks @AugustMiller).
- Add `Order` object to `ModifyRatesEvent`. (thanks @AugustMiller).
- Add `beforeFetchRates` event.

### Changed
- Update FedEx for Ground Transit Time. FedEx handles the delivery date for Ground different than Express. For Ground, they use `TransitTime`. (thanks @keyurshah).

### Fixed
- Fix provider icon error for custom provider.
- Fix USPS/UPS handles, incorrectly being set as `uSPS` and `uPS`.
- Fix incorrect caching of rates for multiple providers.
- Fix zero-based rates not being shown to pick during checkout.
- Fix AusPost and Canada post error handling.

## 2.0.8 - 2019-08-17

### Fixed
- Remove provider settings from shipping method requests, particularly for XHR.
- Fix debug statements occurring for non-site requests.

## 2.0.7 - 2019-08-16

### Added
- Add support for Commerce 3.
- Add more UPS services, and change the way UPS services match.

## 2.0.6 - 2019-07-16

### Fixed
- Fix provider settings not being populated on shipping methods and rules. Meant markup rates weren't working correctly.

## 2.0.5 - 2019-07-13

### Added
- Add `modifyRates` providing access to the raw response from a provider and the extracted shipping rates. See [docs](https://verbb.io/craft-plugins/postie/docs/developers/events#the-modifyRates-event).
- All shipping rates now have additional options available on the shipping rule. See [docs](https://verbb.io/craft-plugins/postie/docs/setup-configuration/displaying-rates#rate-options).
- Add negotiated rate support for UPS.

### Fixed
- Fix error with store location state for UPS.

## 2.0.4 - 2019-06-01

### Added
- Add `delayFetchRates`, `manualFetchRates` and `fetchRatesPostValue`.

### Changed
- Improve in-memory caching.

### Fixed
- Fix memory issues in certain cases when fetching rates.
- Tweak state handling for Fedex.

## 2.0.3.1 - 2019-04-10

### Fixed
- Remove leftover debugging.

## 2.0.3 - 2019-04-10

### Fixed
- Fix return type incompatibility causing errors.
- Fix dimensions API issue with Canada Post.
- Improve response error handling for Canada Post.
- Fix lack of formatting handling for Canada Post zip codes.

## 2.0.2 - 2019-04-07

### Fixed
- Swap XML parser for Canada Post.
- Fix missing shipping description.

## 2.0.1 - 2019-03-27

### Fixed
- Fix some error messages themselves throwing errors.

## 2.0.0 - 2019-03-26

### Added
- Craft 3/Commerce 2 support.
- Add Canada Post provider.
- Add Fastway provider.
- Add initial TNT provider. Please contact us with API account details to finalise!
- Add `displayDebug` config setting.
- Add `displayErrors` config setting.
- Add `enableCaching` config setting.
- Add `enabled` config setting for each provider.
- Add provider icons, and CP UI improvements.

### Changed
- Updated provider functions for easier/clearer extendability. See docs.
- Updated cache mechanism for better performance.
- Australia Post now fetches shipping rates in a single API call. 
- Removed `originAddress` config setting in favour of Commerce's `Store Location`.
- Provider handles in config file are now required to be provided in camel case.

## 1.0.2 - 2018-08-01

### Added
- Add config setting to disable cache.
- Add UPS Provider.

### Fixed
- Fedex - Add config setting `disableCache` for test endpoint (not default when using DevMode).
- Fedex - fix services from pre1.0.1 causing issues.

## 1.0.1 - 2018-01-22

### Added
- Add management of shipping category conditions for shipping methods.

## 1.0.0 - 2017-12-11

- Initial release.
