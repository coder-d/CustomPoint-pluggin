=== Inpsyde Custom Point ===
Contributors: (Debanjan Sengupta)
Author URI: 
Tags: wordpress, plugin
Requires at least: wordpress 5
Tested up to: 5.5.3
Stable tag: 5.5
Requires PHP: 7.2.4 or later
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Description ==

Create and make available a custom NOT A REST endpoint "http://localhost/wordpress/inpsyde_custom_end_point". When a visitor navigates to that endpoint, the plugin send an HTTP request to a REST API endpoint. The API is available at https://jsonplaceholder.typicode.com/ and the endpoint to call is /users.The plugin will parse the JSON response and will use it to build and display an HTML table.

== Installation ==

This section describes how to install the plugin and get it working.

1. Just upload the plugin files to the '/wp-content/plugins/inpsydeCustomPoint-pluggin' directory, or install the plugin through the composer with "composer require debanjan/inpsyde_custom_end_point" command.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. (When installed, the plugin has to make available a custom endpoint on the WordPress site "/inpsyde_custom_end_point". With “custom endpoint” we mean an arbitrary URL not recognized by WP as a standard URL, like a permalink or so.
Note that this is not a REST endpoint. When a visitor navigates to that endpoint, the plugin has to send an HTTP request to a REST API endpoint. The API is available at https://jsonplaceholder.typicode.com/ and the endpoint to call is /users.
The plugin will parse the JSON response and will use it to build and display an HTML table. Each row in the HTML table will show the details for a user. The column's id, name, and username are mandatory.
The content of three mandatory columns must be a link (<a> tag). When a visitor clicks any of these links, the details of that user must be shown. For that, the plugin will do another API request to the user-details endpoint.
See https://jsonplaceholder.typicode.com/guide.html for documentation.
These details fetching requests must be asynchronous (AJAX) and the user details will be shown without reloading the page.
At any time, the page will show details for at max one user. In fact, at every link click, a new user detail will load, replacing the one currently shown.
)


== INFO section ==

This approach of using a base init class to initialize the plugin classes might not be the most popular way to code wordpress plugins but I feel for complex plugins this is a better way to manange/expand features.

The "getApiInfo()" store in database for up to 24 hours Then, you just need to call getApiInfo() anywhere in your code to retrieve the data you need. If you call the function multiple times in the same request/script, it will still only yell out to the database once. If you call the function in multiple requests within a 24 hour period, it will only send the API request once.

For the "user details request" default cache is used to fetch.

 Git  has been used for versioning the  code base: https://github.com/coder_d/inpsydeCustomPoint-pluggin;  

Phpunit and Brian monkey library has been used to write test case.


== Markdown ==

Ordered list:

1. The plugin will parse the JSON response and will use it to build and display an HTML table
2. The content of three mandatory columns must be a link (<a> tag)
3. When a visitor clicks any of these links, the details of that user must be shown. For that, the plugin will do another API request to the user-details endpoint.
4. These details fetching requests must be asynchronous (AJAX) and the user details will be shown without reloading the page.
