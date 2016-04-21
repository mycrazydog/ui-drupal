Chart injector
===========

Allows administrators to inject JS into the page output based on configurable
rules. It's useful for adding simple JS tweaks without modifying a site's
official theme - for example, a 'nighttime' color scheme could be added during
certain hours. The JS is added using Drupal's standard drupal_add_js()
function and respects page caching, etc.

This module is definitely not a replacement for full-fledged theming, but it
provides site administrators with a quick and easy way of tweaking things
without diving into full-fledged theme hacking.

The rules provided by JS injector typically are loaded last, even after the
theme JS, although another module could override these.


NOTE- assets/regional-data-topic-dd.php - is not used in this module. It is a php include file for the data pages. I just needed somewhere it to put it.
