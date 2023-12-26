<?php
// Code By WebCraker 2023 | https://support-ar.net
// Source : https://github.com/W3bCrak3r/PHP-Image-Resize-Script-from-SSH
function resizeImages($dir) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'bmp'];
    $maxWidth = 1024; // Change the maximum width as you wish

    $files = scandir($dir);

    foreach ($files as $file) {
        $path = $dir . '/' . $file;

        if ($file != '.' && $file != '..') {
            if (is_dir($path)) {
                echo "Processing directory: $path\n";
                resizeImages($path); // Recursively resize images in subdirectories
            } else {
                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

                if (in_array($extension, $allowedExtensions)) {
                    list($width, $height) = getimagesize($path);

                    if ($width > $maxWidth) {
                        echo "Resizing $file...\n";

                        $img = null;

                        switch ($extension) {
                            case 'jpg':
                            case 'jpeg':
                                $img = imagecreatefromjpeg($path);
                                break;
                            case 'png':
                                $img = imagecreatefrompng($path);
                                break;
                            case 'bmp':
                                $img = @imagecreatefrombmp($path); // Custom function for BMP (You may need to implement this)
                                break;
                        }

                        if ($img) {
                            $newWidth = $maxWidth;
                            $newHeight = ($height / $width) * $newWidth;

                            $newImg = imagecreatetruecolor($newWidth, $newHeight);
                            imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                            switch ($extension) {
                                case 'jpg':
                                case 'jpeg':
                                    imagejpeg($newImg, $path);
                                    break;
                                case 'png':
                                    imagepng($newImg, $path);
                                    break;
                                case 'bmp':
                                    imagewbmp($newImg, $path); // Save the resized BMP
                                    break;
                            }

                            imagedestroy($img);
                            imagedestroy($newImg);
                        } else {
                            echo "Skipping $file. Unable to process BMP file.\n";
                        }
                    }
                }
            }
        }
    }
}

// Usage: Provide the directory path where the images are located
$directory = '/path/to/your/images/folder';
echo "Starting image resizing...\n";
resizeImages($directory);
echo "Image resizing completed.\n";
?>
