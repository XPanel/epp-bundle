# EppBundle

A Symfony3 Bundle to wrap the EPP connection functionality in a more "classy" way.

[![Latest Stable Version](https://poser.pugx.org/xpanel/epp-bundle/v/stable)](https://packagist.org/packages/xpanel/epp-bundle) [![Total Downloads](https://poser.pugx.org/xpanel/epp-bundle/downloads)](https://packagist.org/packages/xpanel/epp-bundle) [![Latest Unstable Version](https://poser.pugx.org/xpanel/epp-bundle/v/unstable)](https://packagist.org/packages/xpanel/epp-bundle) [![License](https://poser.pugx.org/xpanel/epp-bundle/license)](https://packagist.org/packages/xpanel/epp-bundle) [![Monthly Downloads](https://poser.pugx.org/xpanel/epp-bundle/d/monthly)](https://packagist.org/packages/xpanel/epp-bundle) [![Daily Downloads](https://poser.pugx.org/xpanel/epp-bundle/d/daily)](https://packagist.org/packages/xpanel/epp-bundle) [![composer.lock](https://poser.pugx.org/xpanel/epp-bundle/composerlock)](https://packagist.org/packages/xpanel/epp-bundle) 

## Installation

### Step 1: Install the Bundle

Require the Bundle with composer:

    $ composer require xpanel/epp-bundle

### Step 2: Enable the Bundle

Register the bundle in AppKernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = [
        // ...
        new Xpanel\Bundle\EppBundle\XpanelEppBundle(),
    ];
}
```

## Usage

``` php
<?php

use Xpanel\Bundle\EppBundle\Exception\EppException;

public function indexAction()
{
    //...

    try {
        $epp = $this->container->get('xpanel_epp');

        $info = array(
            'host' => 'epp.xpanel.com',
            'port' => 700,
            'timeout' => 30,
            'verify_peer' => false,
            'cafile' => '/etc/pki/tls/certs/ca-bundle.crt',
            'local_cert' => '/etc/pki/tls/certs/cert.crt',
            'local_pk' => '/etc/pki/tls/private/private.key',
            'passphrase' => 'XPanel.Online',
            'allow_self_signed' => true
        );
        $epp->connect($info);


        $epp->login(array(
            'clID' => 'Client123',
            'pw' => 'Pass-W0rd',
            'prefix' => 'XP'
        ));


        $checkparams = array(
            'domains' => array('test1.xy','test2.xy')
        );
        $domainCheck = $epp->domainCheck($checkparams);


        $infoparams = array(
            'domainname' => 'test1.xy',
            'authInfoPw' => 'aA1+XPanel+EPP'
        );
        $domainInfo = $epp->domainInfo($infoparams);


        $createparams = array(
            'domainname' => 'test1.xy',
            'period' => 2,
            'nss' => array('NS1.XPANEL.NET','NS2.XPANEL.NET'),
            'registrant' => 'XP-1122334455777',
            'contacts' => array(
                'XP-1122334455777' => 'admin',
                'XP-1122334455777' => 'tech',
                'XP-1122334455777' => 'billing'
                ),
            'authInfoPw' => 'aA1+XPanel+EPP'
        );
        $domainCreate = $epp->domainCreate($createparams);

    }

    catch (EppException $e) {
        echo 'Error: ', $e->getMessage();
    }


echo '<pre>';
print_r($domainCheck);
print_r($domainInfo);
print_r($domainCreate);
echo '</pre>';

    //...
}
```

## Questions

Feel free to [contact me](mailto:info@xpanel.com)

> made with ♥