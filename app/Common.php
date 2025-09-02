<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

use Config\View;

if (! function_exists('view')) {
    /**
     * Grabs the current RendererInterface-compatible class
     * and tells it to render the specified view. Simply provides
     * a convenience method that can be used in Controllers,
     * libraries, and routed closures.
     *
     * NOTE: Does not provide any escaping of the data, so that must
     * all be handled manually by the developer.
     *
     * @param array $options Options for saveData or third-party extensions.
     */
    function view(string $name, array $data = [], array $options = []): string
    {
        $renderer = service('renderer');

        $config   = config(View::class);
        $saveData = $config->saveData;

        if (array_key_exists('saveData', $options)) {
            $saveData = (bool) $options['saveData'];
            unset($options['saveData']);
        }

        return $renderer->setData($data, 'raw')->render($name, $options, $saveData);
    }
}

if (! function_exists('mainView')) {
    /**
     * Grabs the current RendererInterface-compatible class
     * and tells it to render the specified view. Simply provides
     * a convenience method that can be used in Controllers,
     * libraries, and routed closures.
     *
     * NOTE: Does not provide any escaping of the data, so that must
     * all be handled manually by the developer.
     *
     * @param array $options Options for saveData or third-party extensions.
     */
    function mainView(string $name, array $data = [], array $options = []): string
    {
        $header = view('includes/header', $data, $options);
        $body = view($name, $data, $options);
        $footer = view('includes/footer', $data, $options);

        return $header . $body . $footer;
    }
}

if (! function_exists('dashboardView')) {
    function dashboardView(string $name, array $data = [], array $options = []): string
    {
        $header = view('includes/header', $data, $options);
        $footer = view('includes/footer', $data, $options);
        $navbar = view('includes/navbar', $data, $options);
        $sidebar = view('includes/sidebar', $data, $options);
        $body = view($name, $data, $options);

        $layout =
            "<div style='display:flex'>
                <div>$sidebar</div>
                <div style='flex-grow:1'>
                $navbar
                $body
                </div>
            </div>";

        return $header . $layout . $footer;
    }
}
