<?php

function changeOrientation(GdImage $image, int|null $orientation): GdImage
{
    $rotatedImage = $image;

    switch ($orientation) {
        case 2: // horizontal flip
            imageflip($image, IMG_FLIP_HORIZONTAL);
            $rotatedImage = $image;
            break;
        case 3: // 180 rotate left
            $rotatedImage = imagerotate($image, 180, 0);
            break;
        case 4: // vertical flip
            imageflip($image, IMG_FLIP_VERTICAL);
            $rotatedImage = $image;
            break;
        case 5: // vertical flip + 90 rotate right
            imageflip($image, IMG_FLIP_VERTICAL);
            $rotatedImage = imagerotate($image, -90, 0);
            break;
        case 6: // 90 rotate right
            $rotatedImage = imagerotate($image, -90, 0);
            break;
        case 7: // horizontal flip + 90 rotate right
            imageflip($image, IMG_FLIP_HORIZONTAL);
            $rotatedImage = imagerotate($image, -90, 0);
            break;
        case 8:    // 90 rotate left
            $rotatedImage = imagerotate($image, 90, 0);
            break;
        default:
            break;
    }

    return $rotatedImage;
}

function saveImage(int $quality, int $cropSquare, GdImage $image, string $ending, string $targetFile): void
{
    $exif = exif_read_data($targetFile);

    if (key_exists('Orientation', $exif)) {
        $image = changeOrientation($image, $exif['Orientation']);
    }

    $image = cropImage($cropSquare, $image);

    $newImagePath = str_replace($ending, 'webp', $targetFile);
    $newImagePath = str_replace(strtoupper($ending), 'webp', $newImagePath);
    $newImagePath = str_replace('_old', 'new', $newImagePath);

    imagewebp($image, $newImagePath, $quality);

    imagedestroy($image);
}

function chooseQuality(): int
{
    $autoQuality = readline('Auto quality?(y/n); ');

    if ('y' == $autoQuality) {
        return 75;
    } else {
        return readline('Pick the quality(0-100): ');
    }
}

function cropSquareInput(): int
{
    if ('n' == readline('Crop to square?(y/n): ')) {
        return 0;
    }

    return readline('Keep Left/Top (1), Middle (2) or Right/Bottom(3)?: ');
}

function cropImage(int $cropSquare, GdImage $image): GdImage
{
    if (0 != $cropSquare) {
        $imageW = imagesx($image);
        $imageH = imagesy($image);
        $size = min($imageW, $imageH);

        switch ($cropSquare) {
            case 1:
                $x = 0;
                $y = 0;
                $image = imagecrop($image, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
                break;
            case 2:
                $x = ($imageW - $size) / 2;
                $y = ($imageH - $size) / 2;
                $image = imagecrop($image, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
                break;
            case 3:
                $x = $imageW - $size;
                $y = $imageH - $size;
                $image = imagecrop($image, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
                break;
            default:
                break;
        }
    }

    return $image;
}

$quality = chooseQuality();
$cropSquare = cropSquareInput();

$old_dir = './_old/';

if ($handle = opendir($old_dir)) {
    while (false !== ($file = readdir($handle))) {
        echo $old_dir.$file."\n\r";

        $targetFile = $old_dir.$file;
        $ending = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        switch ($ending) {
            case 'jpg':
                $image = imagecreatefromjpeg($targetFile);
                if ($image) {
                    saveImage($quality, $cropSquare, $image, $ending, $targetFile);
                }
                break;
            case 'png':
                $image = imagecreatefrompng($targetFile);
                if ($image) {
                    saveImage($quality, $cropSquare, $image, $ending, $targetFile);
                }
                break;
            default:
                break;
        }
    }
}

if ($handle) {
    closedir($handle);
}
