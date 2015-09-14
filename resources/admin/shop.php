<?php

add_filter('themosisRouteConditions', function($conds)
{
    // Add the product condition.
    $conds['shop'] = 'is_shop';
    $conds['product'] = 'is_product';

    return $conds;
});