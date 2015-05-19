<?php

/**
 * BbPHP: Blackboard Web Services Library for PHP
 * Copyright (C) 2011 by St. Edward's University (www.stedwards.edu)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * This is a stub class for service calls made under the Gradebook service.
 *
 * @author johns
 *
 */
class Gradebook extends Service
{

    public function __call($method, $args = null)
    {
        return parent::buildBody($method, 'Gradebook', $args[0]);
    }

    public function getGrades($args)
    {
        $body = '<ns1:courseId>' . $args['courseId'] . '</ns1:courseId>';
        $body .= '<ns1:filter>';


        foreach ($args['filter'] as $key => $arg) {
            if (!is_array($arg)) {
                $body .= '<ns1:' . $key . '>' . $arg . '</ns1:' . $key . '>';
            } else {
                foreach ($arg as $sub_arg) {
                    $body .= '<ns1:' . $key . '>' . $sub_arg . '</ns1:' . $key . '>';
                }
            }

        }

        $body .= '</ns1:filter>';

        return parent::buildBody("getGrades", "Gradebook", $body);
    }
}

?>