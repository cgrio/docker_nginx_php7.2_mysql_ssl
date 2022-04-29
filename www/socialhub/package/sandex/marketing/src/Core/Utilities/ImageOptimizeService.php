<?php

namespace Sandex\Marketing\Core\Utilities;

class ImageOptimizeService
{
    public function getImageDimensions(string $imagePath): array
    {
        list($width, $height) = getimagesize($imagePath);
        return [
            'x' => $width,
            'y' => $height
        ];
    }

    public function scaleByPercentage(string $sourceImagePath, float $scale, string $destImagePath): string
    {
        $file = file_get_contents($sourceImagePath);
        $info = getimagesizefromstring($file);

        $w = $info[0];
        $h = $info[1];
        $newWidth = $w * $scale;
        $newHeight = $h * $scale;

        $image = imagecreatefromstring($file);
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $w, $h);
        imagejpeg($tmp, $destImagePath, 100);

        return $destImagePath;
    }

    public function scaleByDimension(
        string $sourceImagePath,
        float $targetSize,
        string $destImagePath,
        string $dimension = "w"
    ): string {
        $file = file_get_contents($sourceImagePath);
        $info = getimagesizefromstring($file);

        $w = $info[0];
        $h = $info[1];
        if ($dimension = "w") {
            $newWidth = $w * ($targetSize / $w );
            $newHeight = $h * ($targetSize / $w );
        } else {
            $newWidth = $w * ($targetSize / $h );
            $newHeight = $h * ($targetSize / $h );
        }

        $image = imagecreatefromstring($file);
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $w, $h);
        imagejpeg($tmp, $destImagePath, 100);

        return $destImagePath;
    }
}
