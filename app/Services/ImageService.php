<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Interfaces\ImageInterface;

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

        return $this->_toWebp($image);
    }

    /**
     * Resize the image to the specified width and height.
     *
     * @param int $width The width to resize the image to.
     * @param int|null $height The optional height to resize the image to. Default is null.
     * @return string The path to the resized image in webp format.
     */
    public function resize(int $width = null, int $height = null): string
    {
        $image = $this->imageManager->read($this->image);

        $image->scaleDown($width, $height);

        return $this->_toWebp($image);
    }

    /**
     * Converts the image to WebP format.
     *
     * @return string The path of the converted image.
     */
    public function toWebP(): string
    {
        $image = $this->imageManager->read($this->image);
        return $this->_toWebp($image);
    }

    /**
     * Converts an image to WebP format and returns the WebP string.
     *
     * @param ImageInterface &$image The image object to be converted.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return string The WebP string representation of the converted image.
     */
    private function _toWebp(ImageInterface &$image): string
    {
        $webp = $image->toWebp()->toString();

        fclose($this->image);
        return $webp;
    }
}
