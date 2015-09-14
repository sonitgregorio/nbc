<?php

if(! function_exists('session'))
{
    function session($index, $val = '')
    {
        //getting value from session
        if(empty($val))
        {
            if(! is_array($index))
            {
                return get_instance()->session->userdata($index);
            }
        }

        //setting value to session
        if(! is_array($index) AND ! empty($val))
        {
            get_instance()->session->set_userdata($index, $val);
        }
        else
        {
            get_instance()->session->set_userdata($index);
        }
    }
}
