Installation
============

Download
--------
::

    git submodule add https://chok@github.com/chok/sfAdsensePlugin.git plugins/sfAdsensePlugin
OR::

    git clone https://chok@github.com/chok/sfAdsensePlugin.git plugins/sfAdsensePlugin

Enable plugin
-------------

/config/ProjectConfiguration.class.php::

  public function setup()
  {
    ...
    $this->enablePlugins('sfAdsensePlugin');
    ...
  }

Add helper
----------

/apps/*/config/settings.yml::

    all:
      .settings:
        ...
        standard_helpers:
          - ...
          - sfAdsense

Or in a template::
  
  <?php use_helper('sfAdsense') ?>




Use
===

Configuration
-------------

*/config/app.yml::
 
  all:
    adsense:
      adv_1: 
        client: ca-pub-xxx
        slot: xxx
        width: 120
        height: 600
      adv_2: 
        client: ca-pub-xxx
        slot: xxx
        width: 120
        height: 240


View
----

In a template::

  <?php include_adsense_block('adv_1') ?>
