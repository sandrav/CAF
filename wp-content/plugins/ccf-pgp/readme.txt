=== CCF-PGP ===
Contributors: Sandra Vega
Tags: contact form, web form, custom contact form, custom forms, captcha form, contact fields, form mailers, save submission in database, pgp encrypt form
Requires at least: 2.8.1
Tested up to: 3.3.1
Stable tag: 1.0.0

A merge between Custom Contact Form v. 5.0.0.1 by Author Taylor Lovett & PGPCheckout by Gabriel Jurgens

== Description ==

I needed to build customizable forms and be able to encrypt some of their data using pgp encryption before saving it to the DataBase. So I merged 2 plugins, one capable of building customizable forms, and saving its submissions to a DataBase, and the other mostly capable of encrypt, save and decrypt data using pgp. 

Special Features:
------------------
	This are inherited from Custom Contact Forms:

*	__NEW__ Rearrange fields with a drag-and-drop interface
*	__NEW__ Export form submissions to .CSV
*	__NEW__ File Upload Fields
*	__NEW__ Redesigned admin panel
*	__NEW__ - Option to only include JQuery and CSS and pages that actually use your forms
*	__NEW__ - Date field that when click displays a stylish calender popover
*	Saved Form Submission dashboard widget!
*	Instantly attach a dropdown with all the countries or all the US States - new fixed fields
*	Import and export forms/fields/styles/etc. with ease!
*	All form submissions saved and displayed in admin panel as well as emailed to you
*	This plugin can now be translated in to different languages.
*	Error messages can be customized for each field
*	Choose between XHTML or HTML. All code is clean and valid!
*	Create __unlimited__ forms
*	Create __unlimited__ fields
*	Required Fields
*	__NEW__ - a dashboard widget that displays the latest form submissions
*	Custom Contact Forms now uses PHPMailer and thus supports STMP and SSL
*	Have your contact forms send mail to multiple email addresses
*	Create text fields, textareas, checkboxs, and dropdown fields!
*	Custom HTML Forms Feature - if you are a web developer you can write your own form html and __use this plugin simply to process your form requests__. Comes with a few useful features.
*	__Displays forms in theme files__ as well as pages and posts.
*	Set a different destination email address for each form
*	Customize every aspect of fields and forms: titles, labels, maxlength, initial value, form action, form method, form style, and much more
*	Create checkboxes, textareas, text fields, etc.
*	__Captcha__ and __"Are You Human?"__ spam blockers included and easily attached to any form
*	Create __custom styles in the style manager__ to change the appearance of your forms: borders, font sizes, colors, padding, margins, background, and more
*	You can create unlimited styles to use on as many forms as you want without any knowledge of css or html.
*	Show a stylish JQuery form thank you message or use a custom thank you page.
*	Custom error pages for when forms are filled out incorrectly
*	Option to have forms remember field values for when users hit the back button after an error
*	Easily report bugs and suggest new features
*	Script in constant development - new version released every week
*	Easily process your forms with 3rd party sites like Infusionsoft or Aweber
*	Set a __custom thank you page__ for each form or use the built in thank you page popover with a custom thank you message
*	No javascript required
*	Detailed guide for using the plugin as well as default content to help you understand how to use Custom COntact Forms
*	Stylish field tooltips powered by jquery
*	Manage options for your dropdowns and radio fields in an easy to use manager
*	Popover forms with Jquery (Coming soon!)
*	Free unlimited support
*	AJAX enabled admin panel
*	Assign different CSS classes to each field.
*	Ability to disable JQuery if it is conflicting with other plugins.
*	Uses UTF8 character set so non-english characters are easily used!

Also it adds a property to fields, "private" that makes them to be encrypted befores saving into DataBase. Private fields are not sent over email to administrators. You can see your public data in Saved Form Submissions page and you can then provide your pgp private key to see the encrypted data as well. CCF PGP plugin will save the last public key used for encryption.

You must use with care since encrypted data can be lost if you change public key.


Restrictions/Requirements:
-------------------------
*	Works with Wordpress 2.8.1+
*	PHP 5
*	PHP register_globals and safe_mode should be set to "Off" (this is done in your php.ini file)
*	Your theme must call wp_head() and wp_footer()

== Installation ==
1. Upload to /wp-content/plugins
2. Activate the plugin from your Wordpress Admin Panel
3. Configure the plugin, create fields, and create forms in the Settings page called Custom Contact Forms
4. Display those forms in posts and pages by inserting the code: __[ccfpgp form=FORMID]__
5. In the instruction section of the plugin. Press the button to insert the default content. The default content contains a very generic form that will help you understand the many ways you can use Custom Contact Forms.

== Configuring and Using the Plugin ==
1. Create as many forms as you want.
2. Create fields and attach those fields to the forms of your choice. Attach the fields in the order that you want them to show up in the form. If you mess up you can detach and reattach them.
3. Display those forms in posts and pages by inserting the code: __[customcontact form=FORMID]__. Replace __FORMID__ with the id listed to the left of the form slug next to the form of your choice above. You can also __display forms in theme files__; the code for this is provided within each forms admin section.
4. Prevent spam by attaching the fixed field, captcha or ishuman. Captcha requires users to type in a number shown on an image. Ishuman requires users to check a box to prove they aren't a spam bot.
5. Add a form to your sidebar, by dragging the Custom Contact Form reusable widget in to your sidebar.
6. Configure the General Settings appropriately; this is important if you want to receive your web form messages!
7. Create form styles to change your forms appearances. The image below explains how each style field can change the look of your forms.
8. (advanced) If you are confident in your HTML and CSS skills, you can use the Custom HTML Forms feature as a framework and write your forms from scratch. This allows you to use this plugin simply to process your form requests. The Custom HTML Forms feature will process and email any form variables sent to it regardless of whether they are created in the fields manager.

Custom Contact Forms is an extremely intuitive plugin allowing you to create any type of contact form you can image. CCF is very user friendly but with possibilities comes complexity. __It is recommend that you click the button in the instructions section of the plugin to add default fields, field options, and forms.__ The default content will help you get a feel for the amazing things you can accomplish with this plugin. __It is also recommended you click the "Show Plugin Usage Popover"__ in the instruction area of the admin page to read in detail about all parts of the plugin.

== Support ==
For questions, feature requests, and support concerning the Custom Contact Forms plugin, please visit:
http://www.taylorlovett.com/wordpress-plugins

== Frequently Asked Questions ==

= Something isn't working. Help! =
*	First try deactivating and reactivating the plugin
* 	If that doesn't fix the problem, try deleting and reinstalling the plugin
*	If that doesn't work, you should file a bug report.

= When I try to do something in the admin panel, all I get is a new page with a -1. =
*	This is a bug we are currently trying to fix that usually happens in Internet Explorer 8. If you are having this problem, please try using Firefox.

= All my fields and field options got detached. What do I do? Will this happen again? =
*	Custom Contact Forms changed the way fields and field options are attached in version 4.5. It won't happen again. Just reattach everything and continue using the plugin.

= I don't know where to start. This is really confusing. =
*	Read the Plugin Usage Popover; it explains how to use everything in great detail.
*	If you don't want to read or learn anything, simply press the "Insert Default Content" button (in the Plugin Usage Popover). This creates a few basic fields and a form. Then just insert the form in a page, post, or theme file.

= I can't figure out how to insert a form into a page or post. Help! =
*	Find the form in the Form Manager, a snippet of code will be displaed that looks like [ccfpgp form=1]. Replace 1 with the ID for the specific form you want to use and insert the snippet into a page or post. You're done!

= How can I include jQuery and CSS files only on pages that display a form? =
*	First go to general settings, set "Restrict Frontend JS and CSS to Form Pages Only" to "Yes".
*	Now go to the Form Manager, within each of your forms there is a field called "Form Pages". Add the post or page id's where you plan to use that form to the "Form Pages" field.

= I'm not receiving any emails =
*	Check that the "Email Form Submissions" option is set to yes in General Settings.
*	Try filling out a form with the "Use Wordpress Mail Function" option set to "No".
*	Make sure the "Default From" email you are using within General Settings actually exists on your server.
*	Try deactivating other plugins to make sure there are no conflicts
*	If there is still a problem, contact your host. This plugin utilizes existing mail functionality on your server, it doesn't create any new functions. If there is a problem, then it is with Wordpress or your host.

= When I activate CCF PGP, the Javascript for another plugin or my theme does not work. =
*	Disable the "Frontend jQuery" option in General Settings. CCF PGP will still work without JQuery but won't be as pretty.

= I need even more customization in my forms. What can I do? =
*	Use the Custom HTML Forms Feature (see admin panel) which allows you to write the HTML/CSS for each of your forms.

= The form success popover is not showing up. =
*	The form success popover is included in wp_footer. If your theme does not call wp_footer(), it will not work.

= Certain characters aren't showing up correctly in my emails. =
*	First, make sure you are upgraded to the latest version which uses UTF-8
*	If that doesn't fix the problem, try using a different mail client. Sometimes mail clients display certain languages poorly.

== Upgrade Notice ==
We are planning to add popover forms and file attachments soon.

== Screenshots ==
Visit http://www.taylorlovett.com/wordpress-plugins for screenshots. Right now all the screenshots are from Version 1, thus are quite out-dated. Install the plugin to see what it looks like. You won't regret it. I promise!

