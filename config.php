<?php

$config = \App\Config::getInstance();


$config->set('ldap.adapter.mock', false);


/** @var \Composer\Autoload\ClassLoader $composer */
$composer = $config->getComposer();
if ($composer)
    $composer->add('Ldap\\', dirname(__FILE__));

$routes = $config->getRouteCollection();
if (!$routes) return;


$params = array('role' => 'admin');
$routes->add('LDAP Admin Settings', new \Tk\Routing\Route('/ldap/adminSettings.html',
    'Ldap\Controller\SystemSettings::doDefault', $params));


$params = array('role' => array('admin', 'client'));
$routes->add('LDAP Institution Settings', new \Tk\Routing\Route('/ldap/institutionSettings.html',
    'Ldap\Controller\InstitutionSettings::doDefault', $params));


