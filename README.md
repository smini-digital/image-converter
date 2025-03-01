<a id="readme-top"></a>


<!-- PROJECT SHIELDS -->
[![PHP][Php.net]][Php-url]
[![Issues][issues-shield]][issues-url]
[![Unlicense License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">Image converter to create .webp images in bulk</h3>

  <p align="center">
    <a href="https://github.com/smini-digital/image-converter/issues/new?labels=bug&template=bug-report.md">Report Bug</a>
    &middot;
    <a href="https://github.com/smini-digital/image-converter/issues/new?labels=enhancement&template=feature-request.md">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This is a simple images converter which converts .jpg/.jpeg and .png images locally on your PC to .webp images, which then can be used on websites. It also does the following:

* It fixes the orientation of the image
* It resized the image so that the bigger dimension is 1920px if the image is bigger than that

You can also adjust the following:

* Adjust the image quality (Default is 75%)
* Crop the images to squares and decide if left/top, middle or right/bottom is kept


<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

![Prerequisite Screenshot][prerequisite-screenshot]

1. Download the imageConverter.php file. In the same folder create two folders: '_old' and 'new'.
2. Add all images you want to convert to the '_old' folder.


### Installation

Make sure you have [PHP](https://www.php.net/downloads.php) installed.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- USAGE -->
## Usage

Navigate to your main fold in your console or terminal and run the php file:

```sh
  php imageConverter.php
```

It will ask you if you want auto quality (75) or not...

```sh
  Auto quality?(y/n); y
```

```sh
  Auto quality?(y/n); n
  Pick the quality(0-100):
```

... and if you want to crop the images or not:

```sh
  Crop to square?(y/n): y
  Keep Left/Top (1), Middle (2) or Right/Bottom(3)?:
```

```sh
  Crop to square?(y/n): n
```

Here is an example of the different crop settings (Left 1, Middle 2, Right 3):

![Crop Screenshot][crop-screenshot]

It will then browse all images in your '_old' folder and save the .webp images in the 'new' folder. It will output all scanned files for a better overview and then teminate:

```sh
  ./_old/toa-heftiba-U6uxileWeag-unsplash.jpg
```

![Result Screenshot][result-screenshot]
![Comparison Screenshot][comparison-screenshot]



<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- ROADMAP -->
## Roadmap

- [ ] Add HEIC images as possible source files

See the [open issues](https://github.com/smini-digital/image-converter/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- LICENSE -->
## License

Distributed under the Unlicense License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Acknowledgments

Photo by [Toa Heftiba](https://unsplash.com/de/@heftiba) on [Unsplash](https://unsplash.com/de/fotos/person-die-weisses-papier-mit-schwarzbrot-halt-U6uxileWeag)

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[issues-shield]: https://img.shields.io/github/issues/smini-digital/image-converter
[issues-url]: https://github.com/smini-digital/image-converter/issues
[license-shield]: https://img.shields.io/github/license/smini-digital/image-converter
[license-url]: https://github.com/smini-digital/image-converter/blob/main/LICENCE.txt
[linkedin-shield]: https://custom-icon-badges.demolab.com/badge/LinkedIn-0A66C2?logo=linkedin-white&logoColor=fff
[linkedin-url]: https://www.linkedin.com/in/jasmin-dettelbach-22854a45/
[Php.net]: https://img.shields.io/badge/php-%23777BB4.svg?&logo=php&logoColor=white
[Php-url]: https://www.php.net/

[prerequisite-screenshot]: images/prerequisite.png
[crop-screenshot]: images/crop.png
[result-screenshot]: images/result.png
[comparison-screenshot]: images/comparison.png
