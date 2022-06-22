<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/check/ready' => [[['_route' => 'check_ready', '_controller' => 'App\\Controller\\CheckHealthController::checkReadyAction'], null, ['GET' => 0], null, false, false, null]],
        '/check/health' => [[['_route' => 'check_healthy', '_controller' => 'App\\Controller\\CheckHealthController::checkHealthAction'], null, ['GET' => 0], null, false, false, null]],
        '/check/up' => [[['_route' => 'check_up', '_controller' => 'App\\Controller\\CheckHealthController::checkUpAction'], null, ['GET' => 0], null, false, false, null]],
        '/profile' => [[['_route' => 'profile', '_controller' => 'App\\Controller\\ProfileController::getProfileAction'], null, null, null, false, false, null]],
        '/docs' => [[['_route' => 'swagger_ui', '_controller' => 'api_platform.swagger.action.ui'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/(?'
                    .'|docs(?:\\.([^/]++))?(*:196)'
                    .'|contexts/(.+)(?:\\.([^/]++))?(*:232)'
                    .'|users(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:266)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:304)'
                        .')'
                    .')'
                    .'|agencies(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:343)'
                        .')'
                        .'|/(?'
                            .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:384)'
                            .')'
                            .'|([^/]++)/items(?'
                                .'|(?:\\.([^/]++))?(*:425)'
                                .'|/([^/]++)/images(?:\\.([^/]++))?(*:464)'
                            .')'
                        .')'
                    .')'
                    .'|i(?'
                        .'|mages(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:505)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:543)'
                            .')'
                        .')'
                        .'|tem(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:581)'
                                .')'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:622)'
                                    .')'
                                    .'|([^/]++)/images(?:\\.([^/]++))?(*:661)'
                                .')'
                            .')'
                            .'|_types(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:698)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:736)'
                                .')'
                            .')'
                        .')'
                    .')'
                    .'|rentals(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:776)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:814)'
                        .')'
                    .')'
                    .'|tags(?'
                        .'|(?:\\.([^/]++))?(?'
                            .'|(*:849)'
                        .')'
                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                            .'|(*:887)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        196 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        232 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        266 => [
            [['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        304 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        343 => [
            [['_route' => 'api_agencies_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Agency', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_agencies_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Agency', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        384 => [
            [['_route' => 'api_agencies_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Agency', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_agencies_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Agency', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_agencies_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Agency', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_agencies_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Agency', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        425 => [[['_route' => 'api_agencies_items_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Item', '_api_identifiers' => ['id' => ['App\\Entity\\Agency', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_agencies_items_get_subresource', '_api_subresource_context' => ['property' => 'items', 'identifiers' => ['id' => ['App\\Entity\\Agency', 'id', true]], 'collection' => true, 'operationId' => 'api_agencies_items_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        464 => [[['_route' => 'api_agencies_items_images_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Image', '_api_identifiers' => ['id' => ['App\\Entity\\Agency', 'id', true], 'items' => ['App\\Entity\\Item', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_agencies_items_images_get_subresource', '_api_subresource_context' => ['property' => 'images', 'identifiers' => ['id' => ['App\\Entity\\Agency', 'id', true], 'items' => ['App\\Entity\\Item', 'id', true]], 'collection' => true, 'operationId' => 'api_agencies_items_images_get_subresource']], ['id', 'items', '_format'], ['GET' => 0], null, false, true, null]],
        505 => [
            [['_route' => 'api_images_post_collection', '_controller' => 'App\\Controller\\CreateImageController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Image', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => 'api_images_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Image', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        543 => [
            [['_route' => 'api_images_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Image', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_images_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Image', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => 'api_images_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Image', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        581 => [
            [['_route' => 'api_items_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Item', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_items_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Item', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        622 => [
            [['_route' => 'api_items_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Item', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_items_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Item', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_items_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Item', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_items_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Item', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        661 => [[['_route' => 'api_items_images_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Image', '_api_identifiers' => ['id' => ['App\\Entity\\Item', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_items_images_get_subresource', '_api_subresource_context' => ['property' => 'images', 'identifiers' => ['id' => ['App\\Entity\\Item', 'id', true]], 'collection' => true, 'operationId' => 'api_items_images_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        698 => [
            [['_route' => 'api_item_types_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ItemType', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_item_types_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ItemType', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        736 => [
            [['_route' => 'api_item_types_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ItemType', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_item_types_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ItemType', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_item_types_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ItemType', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_item_types_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ItemType', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        776 => [
            [['_route' => 'api_rentals_post_collection', '_controller' => 'App\\Controller\\CreateRentalController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Rental', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => 'api_rentals_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Rental', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        814 => [
            [['_route' => 'api_rentals_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Rental', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_rentals_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Rental', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_rentals_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Rental', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_rentals_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Rental', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        849 => [
            [['_route' => 'api_tags_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tag', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tags_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tag', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        887 => [
            [['_route' => 'api_tags_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tag', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tags_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tag', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_tags_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tag', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_tags_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tag', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
