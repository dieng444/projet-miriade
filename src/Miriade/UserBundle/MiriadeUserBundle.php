<?php

namespace Miriade\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MiriadeUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
