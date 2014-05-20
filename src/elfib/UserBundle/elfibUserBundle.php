<?php

namespace elfib\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class elfibUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
