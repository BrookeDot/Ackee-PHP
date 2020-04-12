<?php

/*
Package: Ackee-PHP
Version: 1.0
File: ackee.class.php
License: GPL-2.0+
(c) 2020 Brooke. Some Rights Reserved
*/

namespace Ackee\PHP;

if (!class_exists('Core')) {
    /**
     * Core Class for implementing Ackee via PHP
     */
    class Core
    {
        private $detailed = false;
        private $dataOpts = array();
       
        /**
         * Validates and returns the URL of the Ackee instance.
         *
         * @since  1.0.0
         * @access private
         * @return string
         */

        private static function getInstallURL()
        {
            if (!defined('ACKEE_INSTALL_URL')) {
                trigger_error('Define ACKEE_INSTALL_URL or no tracker will be echoed', E_USER_WARNING);
            } else {
                $url = filter_var(ACKEE_INSTALL_URL, FILTER_VALIDATE_URL);
                if (false === $url) {
                    trigger_error('ACKEE_INSTALL_URL is not a valid URL', E_USER_WARNING);
                } else {
                    return rtrim($url, '/');
                }
            }
        }

        /**
         * Validates and returns the tracker name from the Ackee instance.
         *
         * @since  1.0.0
         * @access private
         * @return string
         */
        private static function getTrackerName()
        {
            if (!defined('ACKEE_TRACKER')) {
                trigger_error('Define ACKEE_TRACKER or no tracker will be echoed', E_USER_WARNING);
            } else {
                $trackerName = filter_var(ACKEE_TRACKER, FILTER_SANITIZE_STRING);
                if (!preg_match('/^([a-zA-Z0-9-_]+).js$/', $trackerName)) {
                    trigger_error('ACKEE_TRACKER does not end in js or contains invalid characters', E_USER_WARNING);
                } else {
                    return $trackerName;
                }
            }
        }

       /**
         * Validates and returns the domain ID from the Ackee instance.
         *
         * @since  1.0.0
         * @access private
         * @return string
         */
        private static function getDomainID()
        {
            if (!defined('ACKEE_DOMAIN_ID')) {
                trigger_error('Define ACKEE_DOMAIN_ID or no tracker will be echoed', E_USER_WARNING);
            } else {
                $trackerID = filter_var(ACKEE_DOMAIN_ID, FILTER_SANITIZE_STRING);
                if (!preg_match('/^([a-zA-Z0-9-]+$)/', $trackerID)) {
                    trigger_error('ACKEE_DOMAIN_ID is not a valid ID', E_USER_WARNING);
                } else {
                    return $trackerID;
                }
            }
        }
        /**
         * Boolen to determine if the detailed data should be collected
         *
         * Either define ACKEE_DETAILED as true or to a string that will be the name of a cookie
         * which if set as true will make this function return true.
         *
         * @since  1.0.0
         * @link https://github.com/electerious/Ackee/blob/master/docs/Anonymization.md#personal-data
         * @access private
         * @return bool
         */
        private static function useDetailed()
        {
            if (!defined('ACKEE_DETAILED')) {
                return false;
            } elseif (ACKEE_DETAILED === true || filter_var($_COOKIE[ACKEE_DETAILED], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === true) {
                    return true;
            } else {
                return false;
            }
        }

       /**
         * Returns the data-ackee-opts
         *
         * You can add options by passing settings into the $dataOpts global
         *
         * @since  1.0.0
         * @link https://github.com/electerious/Ackee/blob/master/docs/Anonymization.md#personal-data
         * @access private
         * @return string
         */
        private static function buildDataOpts($dataOpts)
        {
            if (self::useDetailed()) {
                $dataOpts['detailed'] = true;
            }
            if (is_array($dataOpts) && !empty($dataOpts)) {
                return "data-ackee-opts='" . json_encode(($dataOpts)) . "'";
            }
        }

        /**
         * Echos the Ackee Script onto the page.
         *
         * @since  1.0.0
         * @access public
         * @return string
         */
        public function ackeeTracker()
        {
            global $dataOpts;

            $installDomain = self::getInstallURL();
            $trackerName   = self::getTrackerName();
            $domainID      = self::getDomainID();
            $dataOpsArray  = self::buildDataOpts($dataOpts);

            echo(
            '<script async src="' . $installDomain . '/' . $trackerName . '" ' .
            'data-ackee-server="' . $installDomain . '" ' .
            'data-ackee-domain-id="' . $domainID . '" ' .
            $dataOpsArray . '> ' .
            '</script>' . "\r\n"
            );
        }
    // end class
    }
//end check if class class_exists
}
