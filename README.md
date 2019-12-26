# gochar

Hugo theme - gochar.

Here are some screen shots.

![screenshot-1](https://github.com/migchar/gochar/blob/master/images/screenshot-1.png?raw=true)

![screenshot-2](https://github.com/migchar/gochar/blob/master/images/screenshot-2.png?raw=true)

![screenshot-3](https://github.com/migchar/gochar/blob/master/images/screenshot-3.png?raw=true)

![screenshot-4](https://github.com/migchar/gochar/blob/master/images/screenshot-4.png?raw=true)

![screenshot-5](https://github.com/migchar/gochar/blob/master/images/screenshot-5.png?raw=true)

## Features

* Responsive full image carousel (Responsive text layout on it should be improved)
* Suited for blogging and personal webpages with static profile image (avatar) and website image (faviconfile)
* Smooth scroll && hierarchical TOC Scrollspy for content (h1~h4)
* Syntax highlighting with PrismJs
* Built-in Tags, Series and Categories && show recomendations of the section in the sidebar
* Built-in pagination for sections
* Previous/Next post button
* Post card list with summary (with/without an intro picture) && Series card list in the sidebar

Most features are optional and can be individually enabled/disabled in your `config/config.toml`.

## Table of Contents

* [Quick Start](#quick-start)
* [Usage](#usage)
  * [Configuration](#configuration)
  * [Carousel Picture](#carousel-picture)
  * [Post Intro Picture](#post-intro-picture)
  * [Post Summary](#post-summary)
  * [Series Intro Picture](#series-intro-picture)
* [License](#license)
* [Thanks](#thanks)

## Quick Start

From the root of your Hugo site, clone the theme into `themes/gochar` by running:

```sh
# Clone theme into the themes/gochar directory
$ git clone https://github.com/migchar/gochar.git themes/gochar
```

## Usage

### Configuration

Please see the sample [`config/config.toml`](https://github.com/migchar/gochar/exampleSite/config/config.toml). The theme is built on hugo_extended_0.58.3_Windows 

If you use this as a theme of your project website (not the root directory),make sure not to use a forward slash `/` in the beginning of a `PATH` in your `config.toml`, `img` in your post head and `url` in your data direcotory, because Hugo will turn it into a relative URL and the `absURL` function will have no effect.

### Series Intro Picture

By default, the series recommendation card list in the sidebar use `themes/gochar/static/img/default.png` as intro picture. You can set `name`, `img`, and `summary` in `data/series.toml`. `name` of the series should be in lower capitals. If the series cannot be found in `series.toml`, `default.png` will be used.

Here is an example of `data/series.toml`:

```TOML
[[series]]
name = "review repo"
img = "images/blog/2018-08/test3.jpg"
summary = "This is the place I write reviews"

[[series]]
name = "blog diary"
img = "images/blog/2018-08/test5.jpg"
summary = "How I build up my personal website"
```


## License

Licensed under the MIT License. 

## Thanks

Thanks to the following projects I learned from:

* Material design for Bootstrap4 [mdb](https://mdbootstrap.com/)
