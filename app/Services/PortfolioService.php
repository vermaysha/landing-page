<?php

namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\Tag;

class PortfolioService
{
    /**
     * Retrieves a paginated list of portfolios.
     *
     * @param int $limit The number of portfolios to retrieve per page. Default is 10.
     * @throws Some_Exception_Class If an error occurs while retrieving the portfolios.
     * @return LengthAwarePaginator A length aware paginator object containing the paginated portfolios.
     */
    public function getPaginated($limit = 10): LengthAwarePaginator
    {
        $portfolios = Portfolio::query()
            ->with('tags')
            ->orderBy('id', 'desc');

        return $portfolios->paginate($limit)
            ->appends(request()->query());
    }

    /**
     * Retrieves a collection of portfolios.
     *
     * @return Collection The collection of portfolios.
     */
    public function get(): Collection
    {
        $portfolios = Portfolio::query()
            ->with('tags')
            ->orderBy('id', 'desc');

        return $portfolios->get();
    }

    /**
     * Find a portfolio by ID.
     *
     * @param int $portfolioId The ID of the portfolio to find.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Portfolio The found portfolio.
     */
    public function findById(int $portfolioId): Portfolio|null
    {
        $portfolio = Portfolio::query()
            ->with('tags')
            ->where('id', $portfolioId);

        return $portfolio->first();
    }

    /**
     * Create a new portfolio.
     *
     * @param array $data The data to create the portfolio.
     * @throws Some_Exception_Class The exception that can be thrown.
     * @return Portfolio The created portfolio.
     */
    public function create(array $data): Portfolio
    {
        $this->_uploadFile($data);
        return DB::transaction(function () use ($data) {
            $portfolio = Portfolio::create($data);
            $portfolio->syncTags($data['tags']);
            return $portfolio;
        });
    }

    /**
     * Update a portfolio.
     *
     * @param Portfolio $portfolio The portfolio to be updated.
     * @param array $data The updated data for the portfolio.
     * @throws Some_Exception_Class Description of exception (if applicable).
     * @return Portfolio The updated portfolio.
     */
    public function update(Portfolio $portfolio, array $data): Portfolio
    {
        $this->_uploadFile($data);
        $oldImage = $portfolio->image;
        $oldThumbnail = $portfolio->thumbnail;
        $result =  DB::transaction(function () use ($portfolio, $data) {
            $portfolio->syncTags($data['tags']);
            return $portfolio->update($data);
        });

        if ($result) {
            if (
                isset($data['image']) &&
                $data['image'] instanceof UploadedFile &&
                is_string($data['image'])
            ) {
                Storage::disk('public')->delete($oldImage);
                Storage::disk('public')->delete($oldThumbnail);
            }
        }

        return $portfolio->refresh();
    }

    /**
     * Deletes a portfolio.
     *
     * @param Portfolio $portfolio The portfolio to be deleted.
     * @throws Some_Exception_Class If an error occurs during the deletion process.
     * @return bool|null Returns true if the portfolio is successfully deleted, null otherwise.
     */
    public function delete(Portfolio $portfolio): bool|null
    {
        $delete =  DB::transaction(function () use ($portfolio) {
            return $portfolio->delete();
        });

        if ($delete) {
            Storage::disk('public')->delete($portfolio->image);
            Storage::disk('public')->delete($portfolio->thumbnail);
        }

        return $delete;
    }

    /**
     * Retrieves the tags.
     *
     * @return Collection The collection of tags.
     */
    public function getTags(): array
    {
        $tags = Tag::all();

        return $tags->pluck('name')->toArray();
    }

    /**
     * Uploads a file and updates the data array if the 'image' key is set and the value is an UploadedFile instance.
     *
     * @param array &$data The data array to be updated.
     * @throws Exception If an error occurs during the file upload process.
     */
    private function _uploadFile(array &$data)
    {
        if (!(isset($data['image']) && $data['image'] instanceof UploadedFile)) {
            return;
        }

        $storage = Storage::disk('public');
        $imageFile = $data['image'];
        if (mb_strpos($imageFile->getMimeType(), 'svg') === false) {
            $imagePath = 'portfolio/' . uniqid('img_', true) . '.webp';
            $image = new ImageService($imageFile);
            $storage->put($imagePath, $image->toWebP());
            $data['image'] = $imagePath;

            $thumbnail = new ImageService($imageFile);
            $thumbnailpath = 'portfolio/' . uniqid('thumb_', true) . '.webp';
            $storage->put($thumbnailpath, $thumbnail->resize(width: 500));
            $data['thumbnail'] = $thumbnailpath;
        } else {
            $data['image'] = $data['thumbnail'] = $storage->putFile('portfolio', $imageFile);
        }
    }
}
