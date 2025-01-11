<?php
function resizeImage($source_image_path, $target_width, $target_height)
{
    // Get image dimensions and type
    list($original_width, $original_height, $image_type) = getimagesize($source_image_path);

    // Calculate aspect ratio
    $aspect_ratio = $original_width / $original_height;

    // Adjust target size to maintain aspect ratio
    if ($target_width / $target_height > $aspect_ratio) {
        $target_width = $target_height * $aspect_ratio;
    } else {
        $target_height = $target_width / $aspect_ratio;
    }

    // Create a new image with the target dimensions
    $resized_image = imagecreatetruecolor($target_width, $target_height);

    // Create the appropriate image resource based on the image type
    switch ($image_type) {
        case IMAGETYPE_JPEG:
            $source_image = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_image = imagecreatefrompng($source_image_path);
            // Preserve transparency for PNG
            imagealphablending($resized_image, false);
            imagesavealpha($resized_image, true);
            break;
        case IMAGETYPE_GIF:
            $source_image = imagecreatefromgif($source_image_path);
            // Preserve transparency for GIF
            $transparent_color_index = imagecolortransparent($source_image);
            if ($transparent_color_index >= 0) {
                $transparent_color = imagecolorsforindex($source_image, $transparent_color_index);
                $transparent_index = imagecolorallocate($resized_image, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                imagefill($resized_image, 0, 0, $transparent_index);
                imagecolortransparent($resized_image, $transparent_index);
            }
            break;
        default:
            // throw new Exception("Unsupported image type!");
            header("Location: /error/other.php?error=Unsupported image type!");
    }

    // Resize the original image into the new one
    imagecopyresampled(
        $resized_image,
        $source_image,
        0,
        0,
        0,
        0,
        $target_width,
        $target_height,
        $original_width,
        $original_height
    );

    // Free up memory for the source image
    imagedestroy($source_image);

    // Return the resized image resource
    return $resized_image;
}