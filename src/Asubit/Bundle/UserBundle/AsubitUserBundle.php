<?php

namespace Asubit\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AsubitUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
