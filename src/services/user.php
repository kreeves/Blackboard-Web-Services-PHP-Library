<?php 
/**
 * BbPHP: Blackboard Web Services Library for PHP
 * Copyright (C) 2011 by St. Edward's University (www.stedwards.edu)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * 
 * This is a stub class for service calls made under the User service.
 * 
 * @author johns
 *
 */
class User extends Service {
	
	public function getUser($args) {
		$body = '<ns1:filter xmlns:ns2="http://user.ws.blackboard/xsd">';
		
		foreach ($args['filter'] as $key => $arg) {
			$body .= '<ns2:' . $key . '>' . $arg . '</ns2:' . $key . '>';
		}

		$body .= '</ns1:filter>';
		
		return parent::buildBody("getUser", "User", $body);
	}

    public function deleteUser($args) {
        $body = "";
        foreach ($args['filter'] as $key => $arg) {
            $body .= '<ns1:' . $key . '>' . $arg . '</ns1:' . $key . '>';
        }

        return parent::buildBody("deleteUser", "User", $body);
    }
	
	public function __call($method, $args = null) {
		return parent::buildBodyUser($method, 'User', $args[0]);
	}
}

?>
