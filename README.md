Weather Service
==================================


[![Build Status](https://travis-ci.com/chrisaugustsson/weatherService.svg?branch=master)](https://travis-ci.org/chrisaugustsson/weatherService.)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/chrisaugustsson/weatherService/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/chrisaugustsson/weatherService/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/chrisaugustsson/weatherService/badges/build.png?b=master)](https://scrutinizer-ci.com/g/chrisaugustsson/weatherService/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/chrisaugustsson/weatherService/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Code Coverage](https://scrutinizer-ci.com/g/chrisaugustsson/weatherService/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/chrisaugustsson/weatherService/?branch=master)

Weather Service provides weather forecast based on IP-address. It uses Darksky API to get the forecast and IPStack to get co-ordinates from IP-address.

You can use this module, together with an Anax installation.

The service comes with views that are build with a structure that corresponds with Bulma CSS framework.



Table of content
------------------------------------

* [Install as Anax module](#Install-as-Anax-module)
* [Install and setup Anax](#Install-and-setup-Anax)
* [Dependency](#Dependency)
* [License](#License)

You can also read this [documentation online](https://canax.github.io/remserver/).



Install as Anax module
------------------------------------

This is how you install the module into an existing Anax installation.

Install using composer.

```
composer require chau/weather-service
```

Copy the needed configuration files. Including API-keys, route-config and config to import into DI.

```
rsync -av vendor/chau/weather-service/config ./
```

Copy the view files nedded using:

```
rsync -av vendor/chau/weather-service/view ./
```


Install and setup Anax
------------------------------------

You need a Anax installation, before you can use this module. You can create a sample Anax installation, using the scaffolding utility [`anax-cli`](https://github.com/canax/anax-cli).

Scaffold a sample Anax installation `anax-site-develop` into the directory `rem`.

```
$ anax create rem anax-site-develop
$ cd rem
```

Point your webserver to `rem/htdocs` and Anax should display a Home-page.



Dependency
------------------

This is a Anax module and primarly intended to be used together with the Anax framework.



License
------------------

This software carries a MIT license. See [LICENSE.txt](LICENSE.txt) for details.



```
 .
..:  Copyright (c) 2018 - 2019 Christopher Augustsson (chris.augustsson@live.se)
```
