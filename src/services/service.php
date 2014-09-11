<?php 
/**
 * BbPHP: Blackboard Web Services Library for PHP
 * Copyright (C) 2011 by St. Edward's University (www.stedwards.edu)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * 
 * The base service class upon which all other services are built.
 * Many services may not need more than this, and exist only as a stub class.
 * 
 * @author johns
 *
 */
class Service {
	
	public function buildBody($method = null, $service, $args = null) {
		
		$body = '<SOAP-ENV:Body xmlns:ns1="http://' . strtolower($service) . '.ws.blackboard">';
		$body .= "<ns1:$method>";
		
		if (!is_array($args) && is_string($args) && $args != null) {
			$body .= $args;
		} else {
			if ($args != null) {
				foreach($args as $key => $arg) {
					if (is_array($arg)) {
						foreach($arg as $sub_arg) {
							$body .= "<ns1:$key>$sub_arg</ns1:$key>";
						}
					} else {
						$body .= "<ns1:$key>$arg</ns1:$key>";
					}
				}
			}
		}
		
		$body .= "</ns1:$method>";
		$body .= '</SOAP-ENV:Body>';
		
		return $body;
	}

    public function buildBodyCourseMembership($method = null, $service, $args = null) {

        $body = '<SOAP-ENV:Body>';
        $body .= '<ns2:' . $method . ' xmlns="http://ws.platform.blackboard/xsd" xmlns:ns2="http://coursemembership.ws.blackboard" xmlns:ns3="http://coursemembership.ws.blackboard/xsd">';

        if (!is_array($args) && is_string($args) && $args != null) {
            $body .= $args;
        } else {
            if ($args != null) {
                foreach($args as $key => $arg) {
                    if (is_array($arg)) {
                        foreach($arg as $sub_arg) {
                            $body .= "<ns1:$key>$sub_arg</ns1:$key>";
                        }
                    } else {
                        $body .= "<ns1:$key>$arg</ns1:$key>";
                    }
                }
            }
        }

        $body .= "</ns2:$method>";
        $body .= '</SOAP-ENV:Body>';

        return $body;
    }

	public function buildBodyUser($method = null, $service, $args = null) {
        $service = strtolower($service);
        $body = '<SOAP-ENV:Body xmlns:ns1="http://' . strtolower($service) . '.ws.blackboard">';
        $body .= '<ns3:' . $method . ' xmlns="http://ws.platform.blackboard/xsd" xmlns:ns2="http://' . strtolower($service) . '.ws.blackboard/xsd" xmlns:ns3="http://' . strtolower($service) . '.ws.blackboard">';
        $body .= "<ns3:$service>";
        if (!is_array($args) && is_string($args) && $args != null) {
            $body .= $args;
        } else {
            if ($args != null) {
                foreach($args as $key => $arg) {
                    if (is_array($arg)) {
                        $body .= "<ns2:$key>";
                        foreach($arg as $subkey => $sub_arg) {
                            $body .= "<ns2:$subkey>$sub_arg</ns2:$subkey>";
                        }
                        $body .= "</ns2:$key>";
                    } else {
                        $body .= "<ns2:$key>$arg</ns2:$key>";
                    }
                }
            }
        }
        $body .= "</ns3:$service>";
        $body .= "</ns3:$method>";
        $body .= '</SOAP-ENV:Body>';

        return $body;
    }
}
?>