# PHP Image Resize Script: Batch Processing for Width Limit
This PHP script recursively resizes images within a specified directory and its subdirectories. It targets images wider than 1024 pixels, reducing their width to a maximum of 1024 pixels while maintaining the aspect ratio. It supports JPG, JPEG, PNG, and BMP formats (limited BMP support). The script provides terminal-based progress updates during execution.

## Purpose
The script is intended to batch resize images larger than 1024 pixels in width to a maximum width of 1024 pixels.
## Functionality
It navigates through the directory structure, searching for supported image files (JPG, JPEG, PNG, and BMP).
When an image larger than 1024 pixels in width is found, it resizes the image while maintaining the aspect ratio.
The script employs the GD library functions to create a new image with the reduced dimensions and saves it over the original file.
## Recursion
It utilizes a recursive function to traverse subdirectories, ensuring all images within the specified directory and its nested folders are processed.
## Output
The script provides progress updates in the terminal (when executed via command line), indicating the files being resized or skipped due to unsupported formats.
## Limitation
Support for BMP files might be limited, and handling might vary due to PHP's GD library not fully supporting BMP. The script attempts to process BMP files but might skip them if unable to handle them correctly.
## Precautionary Note
It's crucial to configure and test the script on a backup of the image directory to ensure it behaves as intended before using it on the actual image data to prevent unintended data loss or unexpected modifications.


## Usage from terminal (SSH):
```
php -q resize.php
```
![php resize from ssh](https://user-images.githubusercontent.com/55418990/284657423-57f4d954-c893-4074-9f88-0d7740c19cea.jpg)
