# Ackee PHP 
Simple PHP class to use add the JavaScript for an [Ackee](https://github.com/electerious/Ackee) instance into a PHP site. 

# Initial Setup and Configuration

First `define` the following constants which will be used by the class:
   
    // Instance URL
    define('ACKEE_INSTALL_URL', 'https://example.com');
    
    // Domain ID for the site
    define('ACKEE_DOMAIN_ID', '123456-abcde-12345-abcdefg-1234');
    
    // Tracker ID, defaults to tracker.js but can be customized
    define('ACKEE_TRACKER', 'tracker.js');

Optionally set `ACKEE_DETAILED` to either `true` or to the name of a cookie that must be set to `true`. Note the cookie is booling so it must be set to `true` and not any other value or string.

    // set to bool true to always use detailed
    define('ACKEE_DETAILED', true);
    //or
    define('ACKEE_DETAILED', 'detailed_consent_cookie');

Once your constants are set you can initate tracking like this:

    // include the class
    require_once 'ackee.class.php';
  
    //call the namespace
    use Ackee\PHP\Core as ackee;

    //ouput the tracker
    new ackee())->AckeeTracker();


You may also pass additional options into the `dataOpts` global like:
`dataOpts['ignoreLocalhost'] = 'true'`


# Changelog

*1.0.0 2020-04-11*

 - Inital release

# License

    Ackee PHP a PHP Class for adding the JavaScript from an Ackee Tracking Instance
    Copyright (C) 2020 Brooke. ( brooke.codes/contact )

    This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.
    
    This program is distributed in the hope that it will be useful,but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See theGNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>
