<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use SplFileObject;
use SplTempFileObject;

class ImageService
{

    /**
     * @var ImageManager
     */
    private $imageManager;

    private $image;

    /**
     * Constructor for the class.
     *
     * @return void
     */
    public function __construct(UploadedFile $image) {
        $this->imageManager = new ImageManager(new Driver());
        $this->image = tmpfile();
        fwrite($this->image, $image->get());
    }

    /**
     * Generate a webp image with a cover effect.
     *
     * @param int $width The desired width of the image.
     * @param int|null $height The desired height of the image. If not provided, it defaults to the value of $width.
     * @throws Exception If the image cannot be read.
     * @return string The webp image as a string.
     */
    public function cover(int $width, int $height = null): string
    {
        $image = $this->imageManager->read($this->image);

        if (empty($height)) {
            $height = $width;
        }

        $image->cover($width, $height);

        $webp = $image->toWebp()->toString();

        fclose($this->image);
        return $webp;
    }
}
