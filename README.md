# Ackee PHP 
Ackee PHP is a PHP Class to simplify adding the JavaScript required to track visits with an [Ackee](https://github.com/electerious/Ackee) tracking instance. 

The goal is to bring server-side functionality to the output of the tracking script.

# Initial Setup and Configuration

## Required Constants
In a `config` file or before initating the class `define` the required constants which are used to generate the tracking script:
   
    // Instance URL
    define('ACKEE_INSTALL_URL', 'https://example.com');
    
    // Domain ID for the site
    define('ACKEE_DOMAIN_ID', '123456-abcde-12345-abcdefg-1234');
    
    // Tracker ID, defaults to tracker.js but can be customized
    define('ACKEE_TRACKER', 'tracker.js');

## Optional Constants

The following constants are optional but provide advanced methods for handling requests:

`ACKEE_DETAILED` ( `bool` | `string` ):  
Enable to collect the [detailed data](https://github.com/electerious/Ackee/blob/master/docs/Anonymization.md#personal-data) about the visitor. 

If set to a string, the value of the constant becomes the name of a cookie. Before detailed tracking is enabled, the value of the cookie or boolean must return `true`. When set to a `false` value the detailed tracking setting is ignored.

    // set to bool true to always use detailed
    define('ACKEE_DETAILED', true);
    //or
    define('ACKEE_DETAILED', 'ackee_detailed_cookie');

`ACKEE_OPT_OUT_COOKIE` ( `string` ):  
Name of the cookie to allow visitors to opt-out of all tracking.

Set the cookie to `true` to disable all tracking on the request. 

    define('ACKEE_OPT_OUT_COOKIE', 'ackee_opt_out_cookie');

`ACKEE_DISABLE_DNT` (`bool`):   
Disable default Do Not Track (DNT) behavior.

By default, this class respects the visitor's DNT setting. If set to `true`, the visit is tracked regardless of the visitor's DNT setting.

    define('ACKEE_DISABLE_DNT', true);

## Initiate Ackee in your footer or where you want the script to appear
Once you have set the constants you can initiate tracking like this:

    // include the class
    require_once 'ackee.class.php';
  
    //call the namespace
    use Ackee\PHP\Core as ackee;

    //ouput the tracker
    (new ackee())->AckeeTracker();


You may also pass additional options into the `dataOpts` global. The contents of this array are JSON encoded and passed into `data-ackee-opts`. For example, if you wanted to ignore visitors from localhost add the following before `AckeeTracker()`:

    $dataOpts['ignoreLocalhost'] = 'true'


# Changelog

*1.0.0 2020-04-11*

 - Initial release

# License

    Ackee PHP is a PHP Class to simplify adding the JavaScript
    required to track visits with an Ackee Tracking Instance
    Copyright (C) 2020 Brooke. ( https://brooke.codes/contact )

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public Licensec
    along with this program.  If not, see <http://www.gnu.org/licenses/>
