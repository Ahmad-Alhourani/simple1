<?php

/**
 * Test1 Management
 * All route names are prefixed with 'admin.test1'.
 */
Route::group(
    [
        'namespace' => 'Test1',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Test1 CRUD
         */
        Route::resource('test1', 'Test1Controller');
    }
);
