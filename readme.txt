=== WPMobile Apps ===
Contributors: MarceloMuriel
Tags: mobile, mobile plugin, mobile theme, android, iphone, ipad, smartphone
Requires at least: 3.4
Tested up to: 3.9.2
Stable tag: 1.0
PHP version at least: 5.3.28
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create a mobile WordPress website experience on your website. 

== Description ==
WPMobile Apps lets you create a mobile experience with built-in Apps and Mobile themes. 

The plugin comes with a theme named Mobilissimo that is exclusively for mobile devices 
(i.e. tablets, smartphones). 

The plugin comes with four Apps to ease the access to information for your 
mobile visitors, they are located in a toolbar at the bottom of the screen. These Apps are:

* Call us: A simple app with your mobile phone number ready to call.
* Opening hours: Quickly inform your visitors of your working days and hours.
* Find us: Display your address with an interactive Google Map to quickly reach you.
* Contact us: A simple form to let your users quickly contact you by e-mail.  

The use of the mobile theme is optional, you might want to use your current theme that supports 
mobile (e.g. responsive theme). In such case you just need to choose while in Theme Activation section.

The Apps can also be used in Desktop mode (e.g. laptops, PCs), there is an option for it. In the case 
you only want the mobile theme, it is also possible to disable the Apps.

== Installation ==
1. Download the plugin, unzip its content and place the WPMobileApps directory inside your  
/wp-content/plugins/ directory.
1. Activate the plugin through the 'Plugins' menu in the the WordPress administration.
1. Choose the theme to use for mobile devices (tablet, handheld) in the 'Theme Activation' submenu of the 
plugin (below Settings). 
1. Configure the Apps individually. You can as well disable all of them or enable them 
also for Desktop.

** IMPORTANT **

To test the Apps and the mobile theme in a desktop browser (e.g. Chrome), you can append ?theme=tablet or 
?theme=handheld to the URL of your site. For example, if you are running your site on localhost, it would 
be http://localhost/?theme=tablet. To switch back to your current theme, reset it by using ?theme=active to 
clean the cookie. 

== Frequently Asked Questions ==
= How to test the plugin in a browser like Chrome? =
You can append ?theme=tablet or ?theme=handheld to the URL of your site, for example http://localhost/?theme=tablet. 
This will display the mobile version (setting a cookie). You will need to put ?theme=active to 
switch back to your current theme or simply delete your cookies.
= How to disable the mobile theme? =
In the Theme Activation submenu of the plugin, choose the theme you want to use for mobile devices (i.e. tablet, smartphone). 
You can use your current theme for example.
= How to disable the Apps? =
In the general settings of the Apps configuration, choose to disable the Apps. This will not load them 
on your website at all.
= How to use the Apps also in desktop browsers such as Chrome? =
Check the enable Apps in desktop option in the Apps configuration panel.
= How to change the CSS styles? =
There is a file for this /core/css/app-panel-custom.css. Apply your custom styles there. For example 
to change the toolbar height: #bottomtoolbar{height: 100px;} Please not that this file is loaded after 
the plugin styles, thus it should override existing styles. 
= Does the plugin delete all its data on uninstall? =
The plugin removes all its data in the wp_options table that start with the wpmob_ prefix. 

== Screenshots ==
1. Apps and Mobilissimo (mobile theme) in mobile view. This is how your site would look just after the 
plugin activation.
2. Apps with your default theme. This is how it looks if the Apps are enabled also for Desktop. Or, if 
you decide to use your current theme for mobile as well. Please note, the theme in this screenshot is 
just an example, in your case it would be your current theme.
3. The general settings of WPMobile Apps. 
4. The Call Us App settings. 

== Changelog ==
= 1.0 Beta =
* Tested in WordPress 3.4 up to 3.9.2 with PHP 5.3.28, 5.4 and 5.5. 

== Known Issues ==
* The plugin does not work together with qTranslate from WordPress 3.9 since that plugin has not been 
updated. You can use mqTranslate instead which is a fork of that plugin compatible up to WordPress 3.9.2.
* WPMobile Apps support localization. By default, it will set the default settings in your WordPress local 
(e.g. en_US). If you use a multi-lingual site with a plugin (such as mqTranslate) you have to enter 
the corresponding text in the App settings. For example, for a multi-lingual label for the Contact us app, 
it would be: <!--:en-->Contact us<!--:--><!--:fr-->Contactez-nous<!--:-->. Your plugin will display the 
correct language on your website.

== Upgrade Notice ==
In future upgrades, all the plugin files are suceptible to be modified or replaced. Therefore, apply your 
custom styles in the file for this purpose. 

All future Apps, will be added under the /apps directory, where each directory is an isolated app. 


