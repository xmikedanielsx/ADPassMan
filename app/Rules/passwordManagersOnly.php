<?php

namespace App\Rules;

use Adldap\Models\User as LdapUser;
use Adldap\Laravel\Validation\Rules\Rule;

class passwordManagersOnly extends Rule
{
    /**
     * Determines if the user is allowed to authenticate.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->user->inGroup(\Config::get('adldap.groupFilter'));
    }
}
