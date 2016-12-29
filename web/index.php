<?php
/**
 * tvsloot.com
 *
 * Copyright (C) 2016 Travis Vander Sloot
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @author    Travis Vander Sloot <travis@tvsloot.com>
 * @copyright 2016 Travis Vander Sloot
 * @license   http://tvsloot.mit-license.org/2016 MIT License
 * @link      http://tvsloot.com
 */

use Relay\RelayBuilder;
use Jnjxp\Viewd\Viewd;
use Aura\View\ViewFactory;
use Aura\Html\HelperLocatorFactory;
use Relay\Middleware\ExceptionHandler;
use Relay\Middleware\ResponseSender;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

require '../vendor/autoload.php';

$view = (new ViewFactory)->newInstance(
    (new HelperLocatorFactory)->newInstance()
);

$view->setLayout('default');

$templates = dirname(__DIR__) . '/templates';
$view->getViewRegistry()->setPaths(["{$templates}/views"]);
$view->getLayoutRegistry()->setPaths(["{$templates}/layouts"]);

$queue = [
    new ResponseSender(),
    new ExceptionHandler(new Response()),
    new Viewd($view)
];

$relay = (new RelayBuilder)->newInstance($queue);
$relay(ServerRequestFactory::fromGlobals(), new Response());
