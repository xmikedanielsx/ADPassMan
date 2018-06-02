<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Adldap\AdldapInterface;

class TestController extends Controller
{
    //
    /**
     * @var Adldap
     */
    protected $ldap;

    /**
     * Constructor.
     *
     * @param AdldapInterface $adldap
     */
    public function __construct(AdldapInterface $ldap)
    {
        $this->ldap = $ldap;
    }

    public function index()
    {
        $users = $this->ldap->search()->users()->get();

        return view('ldap', compact('users'));
    }
}
