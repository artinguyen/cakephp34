<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Http\ServerRequest;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
// Router::addUrlFilter(function (array $params, ServerRequest $request) {

//     if ($params['controller'] === 'lang' && $params['action'] === 'index') {
//         $params['controller'] = 'articles';
//         $params['action'] = 'index';
//         $params['language'] = $params[0];
//         unset($params[0]);
//     }
//     return $params;
// });
Router::defaultRouteClass(DashedRoute::class);

// echo Router::url(['controller' => 'Articles', 'action' => 'view', 'id' => 15]);
// // Will output
// die();
Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */

    // $routes->redirect(
    //     '/',
    //     ['controller' => 'Reports', 'action' => 'multi','en'],
    //     ['lang' => 'en|zh|es','pass' => ['lang']]
    //     // Or ['persist'=>['id']] for default routing where the
    //     // view action expects $id as an argument.
    // );



    // $routes->connect('/message/list', ['controller' => 'Messages', 'action' => 'getListMessage']);
    // $routes->connect('/message/create', ['controller' => 'Messages', 'action' => 'saveMessage'], ['_name' => 'create_message']);
    //$routes->connect('/message/delete/:id', ['controller' => 'Messages', 'action' => 'deleteMessage'],['id' => '[0-9]+', 'pass' => 'id']);
    // $routes->connect(
    // '/message/delete/:id',
    // ['controller' => 'Messages', 'action' => 'deleteMessage'],
    // ['id' => '\d+', 'pass' => ['id']]
//);
//     $routes->connect(
//         '/:slug',
//         ['controller' => 'Articles', 'action' => 'view'],
//         ['routeClass' => 'SlugRoute']
//    );
//     $routes->connect('/monitor/list', ['controller' => 'Reports', 'action' => 'getMonitorList'],['name' => 'report']);
//     $routes->connect('/save-message', ['controller' => 'Reports', 'action' => 'saveMessage']);
//     $routes->connect('/message', ['controller' => 'Reports', 'action' => 'showMessageForm']);
//     $routes->connect('/report', ['controller' => 'Reports', 'action' => 'index'],['name' => 'report']);
//     $routes->connect('/saveMonitor', ['controller' => 'Dashboard', 'action' => 'saveMonitor']);
//     $routes->connect('/getMonitor', ['controller' => 'Dashboard', 'action' => 'getMonitor']);
//     $routes->connect('/uploadCsv', ['controller' => 'Dashboard', 'action' => 'uploadCsv']);
//     $routes->connect('/paging', ['controller' => 'Dashboard', 'action' => 'paging']);
//     $routes->connect('/get-paging', ['controller' => 'Dashboard', 'action' => 'getPaging']);
//     $routes->connect('/createMessage', ['controller' => 'Dashboard', 'action' => 'createMessage']);
//     //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
//     $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index']);
//     $routes->connect('/save', ['controller' => 'Dashboard', 'action' => 'save']);
//     $routes->connect('/create', ['controller' => 'Dashboard', 'action' => 'create']);
//    // $routes->connect('/delete/:id', ['controller' => 'Dashboard', 'action' => 'delete'],['id' => '[0-9]+', 'pass' => 'id']);
//     $routes->connect(
//     '/delete/:id',
//     ['controller' => 'Dashboard', 'action' => 'delete'],
//     ['id' => '\d+', 'pass' => ['id']]
// );
//     $routes->connect(
//     '/name/:name',
//     ['controller' => 'Dashboard', 'action' => 'getName'],
//     ['pass' => ['name']]
// );
    //$routes->connect('/articles', ['controller' => 'Articles', 'action' => 'index']);
    //$routes->connect('/form', ['controller' => 'Dashboard', 'action' => 'form']);
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    //$routes->fallbacks(DashedRoute::class);
    // $routes->connect(
    //     '/change',
    //     ['controller' => 'Articles', 'action' => 'change'],
    //     //['id' => '\d+', 'pass' => ['id']],['_method' => 'post'],
    //     ['_name' => 'change']
    // );
    // $routes->connect(
    //     '/:lang/articles',
    //     ['controller' => 'Articles', 'action' => 'view']
    // );
    // A
    // $routes->connect(
    //     '/:lang/articles/edit',
    //     ['controller' => 'Articles', 'action' => 'edit','en'],['lang' => 'en|zh|es', 'pass' => ['lang']]
    //     //['id' => '\d+', 'pass' => ['id']],['_method' => 'post'],
    //     //['_name' => 'change']
    // );
    
    //$routes->connect('/:lang/:controller', ['controller' => 'Articles','action' => 'edit']);
//     $routes->connect(
//     ':lang/:controller',
//     ['action' => 'index'],
//     ['lang' => 'en|zh|es', 'pass' => ['lang']]
// );

   

//         $routes->connect(
//     ':lang/:controller/:action',
//     [],
//     ['lang' => 'en|zh|es', 'pass' => ['lang']]
// );
    // $routes->connect('/:lang/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute'],['lang' => 'en|zh|es','pass' => ['lang']]);
   // $routes->connect('/:lang/:controller/:action', [], ['routeClass' => 'DashedRoute'],['lang' => 'en|zh|es', 'pass' => ['lang']]);
    // Router::connect('/:language/:controller/:action/*',
    // [
    //             'controller' => 'Articles',
    //             'action' => 'edit',
    //             'language' => 'es'
    //         ],
    //                    array('language' => '[a-z]{2}'));

    // $routes->connect(
    //     '/:controller/:id',
    //     ['action' => 'edit'],
    //     ['id' => '[0-9]+']
    // );
    // $routes->connect('/:arg1/tests/:arg2', ['controller' => 'Articles', 'action' => 'edit'],['pass' => ['arg1', 'arg2']]);
    // $routes->connect(
    //     '/:lang/hola',
    //     [
    //         'controller' => 'Articles',
    //         'action' => 'edit',
    //         'lang' => 'es'
    //     ]
    // );
    // Router::connect('/:language/:controller/:action/*',
    //                    array(),
    //                    array('language' => '[a-z]{2}'));
     $routes->connect(
        '/:lang/:controller/:action',
        [],
        ['lang' => 'en|zh|ja', 'pass' => ['lang']]
    );

     $routes->connect(
        '/:lang/:controller',
        ['action' => 'index'],
        ['lang' => 'en|zh|ja', 'pass' => ['lang']]
    );




   // $routes->connect('/en', ['controller' => 'Reports']);
    $routes->connect(
            ':lang/reports',
            ['controller' => 'Reports','action' => 'multi'],
            ['lang' => 'en|zh|ja', 'pass' => ['lang']]
    );

//         $routes->connect(
//     ':lang/messages',
//     ['controller' => 'Messages','action' => 'index'],
//     ['lang' => 'en|zh|es', 'pass' => ['lang']]
// );
    $routes->fallbacks(DashedRoute::class);
                      
    
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();


