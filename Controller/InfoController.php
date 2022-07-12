<?php
declare(strict_types = 1);

class InfoController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //DROPDOWN WITH ALL USERS (passes ID in post on select)

        //if the post contians an userid (because user selected something)

        //YES? -> ask the userloader to return the requested user

        //returned the $user -> calculation functions
        //prolly also a product

        //load the view
        require 'View/info.php';
    }
}