<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get(/**
 * @return mixed
 */
    '/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
    ->bind('homepage');

$app->get(
/**
 * @param Request $request
 * @param \Silex\Application $app
 * @return \Symfony\Component\HttpFoundation\StreamedResponse
 */
    '/sms/sent.json',
    function (Request $request, Silex\Application $app) {
        $requestedStream = $app['messages']->getSentSMS(
            $app->escape($request->query->get('dateTimeFrom')),
            $app->escape($request->query->get('dateTimeTo')),
            $app->escape($request->query->get('skip')),
            $app->escape($request->query->get('take'))
        );
        $stream = function () use ($requestedStream) {
            echo $requestedStream;
            ob_flush();
            flush();
        };
        return $app->stream($stream, 200, array('Content-Type' => 'application/json'));
    });

$app->get(
/**
 * @param Request $request
 * @param \Silex\Application $app
 * @return \Symfony\Component\HttpFoundation\StreamedResponse
 */
    '/statistics.json',
    function (Request $request, Silex\Application $app) {
        $requestedStream = $app['statistics']->getStatistics(
            $app->escape($request->query->get('dateFrom')),
            $app->escape($request->query->get('dateTo')),
            $app->escape($request->query->get('mccList'))
        );
        $stream = function () use ($requestedStream) {
            echo $requestedStream;
            ob_flush();
            flush();
        };
        return $app->stream($stream, 200, array('Content-Type' => 'application/json'));
    });

$app->get(
/**
 * @param Request $request
 * @param \Silex\Application $app
 * @return \Symfony\Component\HttpFoundation\StreamedResponse
 */
    '/countries.json',
    function (Request $request, Silex\Application $app) {
        $requestedStream = $app['countries']->getCountries();
        $stream = function () use ($requestedStream) {
            echo $requestedStream;
            ob_flush();
            flush();
        };
        return $app->stream($stream, 200, array('Content-Type' => 'application/json'));
    });

$app->get(
/**
 * @param Request $request
 * @param \Silex\Application $app
 * @return \Symfony\Component\HttpFoundation\StreamedResponse
 */
    '/sms/send.json',
    function (Request $request, Silex\Application $app) {
        $requestedStream = $app['sender']->send(
            $app->escape($request->query->get('from')),
            $app->escape($request->query->get('to')),
            $app->escape($request->query->get('text'))
        );
        $stream = function () use ($requestedStream) {
            echo $requestedStream;
            ob_flush();
            flush();
        };
        return $app->stream($stream, 200, array('Content-Type' => 'application/json'));
    });

$app->get(
/**
 * @return mixed
 */
    '/sms/sent',
    function () use ($app) {
        return $app['twig']->render('sentSMS.html.twig', array());
    })->bind('sentSMS');

$app->get(
/**
 * @return mixed
 */
    '/sms/send',
    function () use ($app) {
        return $app['twig']->render('sendSMS.html.twig', array());
    })->bind('sendSMS');

$app->get(
/**
 * @return mixed
 */
    '/statistics',
    function () use ($app) {
        return $app['twig']->render('statistics.html.twig', array());
    })->bind('viewStatistics');


$app->error(/**
 * @param Exception $e
 * @param Request $request
 * @param $code
 * @return Response|void
 */
    function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/' . $code . '.html.twig',
        'errors/' . substr($code, 0, 2) . 'x.html.twig',
        'errors/' . substr($code, 0, 1) . 'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});