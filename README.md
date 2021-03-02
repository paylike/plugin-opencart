# OpenCart plugin for Paylike

**Opencart 2.x is no longer actively receiving updates so for improved security and maintenance we encourage you to use 3.x. You can find the 3.x extension here: https://github.com/paylike/plugin-opencart-3**

This plugin is *not* developed or maintained by Paylike but kindly made
available by the community.

Released under the MIT license: https://opensource.org/licenses/MIT

You can also find information about the plugin here: https://paylike.io/plugins/opencart20

## Supported OpenCart versions

* The plugin has been tested with most versions of Opencart at every iteration. We recommend using the latest version of Opencart, but if that is not possible for some reason, test the plugin with your Opencart version and it would probably function properly. 
* Opencart
 version last tested on: *2.2.0.0*

## Prerequisites

- The plugin needs vQmod to function, you can read how to install it here: https://github.com/vqmod/vqmod/wiki/Installing-vQmod-on-OpenCart

## Installation

Once you have installed OpenCart, follow these simple steps:
1. Signup at [paylike.io](https://paylike.io) (it’s free)
1. Create a live account
1. Create an app key for your OpenCart website
1. Copy all the files inside the `upload` folder to the opencart folder, this will add files to the necessary folders. This should be done via ftp, or inside a file manager, for example the cpanel file manager. 
2. Log in as administrator and click  "Extensions" from the top menu then "extension" then "payments" and install the Paylike plugin by clicking the `Install` link listed there.
3. Click the Edit Paylike button 
4. Add the Public and App key that you can find in your Paylike account and enable the plugin

## Updating settings

Under the extension settings, you can:
 * Update the payment method text in the payment gateways list
 * Update the payment method description in the payment gateways list
 * Update the title that shows up in the payment popup
 * Update the popup description, choose whether you want to show the popup  (the cart contents will show up instead)
 * Add test/live keys
 * Set payment mode (test/live)
 * Change the capture type (Instant/Manual via Paylike Tool)

## Changelog
 * 12/02/2021
   * Bug fix - deprecated order status update procedure.
   * Bug fix - duplicated Paylike panel in admin > order > edit. Removed the duplicated vqmode file.
   * Bug fix - PHP complex expressions compatibility.
   * Added support for multi-language currency separator.
   * Bug fix - Currency separator issue.
