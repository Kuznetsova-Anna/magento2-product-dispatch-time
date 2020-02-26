// todo include moment.js
define([
    'jquery',
    'jquery/ui',
    'mage/mage',
    'js/momentjs/moment'
], function ($) {

    'use strict';

    return function(config, element){
        var countdowndate = config.countdowndate;
        if (countdowndate) {
            // console.log(moment('2016-01-01').add(1, 'year').format('LL'));
        }
        console.log("++++++++++++");
        console.log(countdowndate);
        console.log(element);
    }

});