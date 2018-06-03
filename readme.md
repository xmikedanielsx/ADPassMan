# About AD PassMan

This is just a simple Laravel project that manages passwords for sites. That has notes. 

## Todos:
- Add Password Histories
- Refactor front-end to be a vue

## Install
All you need to do to install it.
- `git clone https://github.com/xmikedanielsx/ADPassMan.git`
- `composer install`
- Copy .env.example and change the ActiveDirectory env variables
- `touch databbas/database.sqlite`
- `php artisan migrate`
- Once you have migrated you need to create an AD Group on your Active Diretory server <br> This group willl be known as `passwordManagers`
- Note you can change this in the .env `ADLDAP_GROUP_FILTER`.
- You can also create other rules. Check [ADLDAP2](https://github.com/Adldap2/Adldap2-Laravel) for more documentation

## Donation or Contribute
If you're currently using this program and are enjoying it. Please feel free to either dontate 
- [Donate Now](https://paypal.me/xmikedanielsx)

Or if your're a developer that would love to make the program better. Please feel free to ask for PR contribution access

## Credits

Thanks to the [ADLDAP2 Team](https://github.com/Adldap2/Adldap2-Laravel) for the laravel PHP integration with Active Directory.


