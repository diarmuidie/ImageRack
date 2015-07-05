ImageRack
=========

> Project repo for the [ImageRack PHP lib](https://github.com/diarmuidie/ImageRack-Kernel). Simple PHP image processor and server. Work in Progress.

Developed by [Diarmuid](https://diarmuid.ie).

[![Build Status](https://travis-ci.org/diarmuidie/ImageRack-Kernel.svg?branch=master)](https://travis-ci.org/diarmuidie/ImageRack-Kernel)
[![Coverage Status](https://coveralls.io/repos/diarmuidie/ImageRack-Kernel/badge.svg?branch=master)](https://coveralls.io/r/diarmuidie/ImageRack-Kernel?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/36f9f8f8-3c75-4942-a106-c98bee268ad5/mini.png)](https://insight.sensiolabs.com/projects/36f9f8f8-3c75-4942-a106-c98bee268ad5)

Features
--------

- Resizes images on the fly based on predefined user templates.
- Uses the [Intervention image manipulation library](https://github.com/Intervention/image).
- Integrates with Local or remote image stores using the [PHP League Flysystem](http://flysystem.thephpleague.com/) filesystem extraction library.
- Ability to cache processed images so that subsequent requests are served quickly.
- SEO friendly and easy to use URLs i.e. `example.com/<template>/path/to/source/image.png`.
- Supports PNG/JPEG images.

Usage
-----

To start a new project:

. . .


Changelog
---------

### Version 0.1 (29 March 2015)

- Initial commit.


Authors
-------

- [Diarmuid](https://diarmuid.ie)


License
-------

The MIT License (MIT)

Copyright (c) 2015 Diarmuid

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
