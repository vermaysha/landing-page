<?php

namespace App\Services;

use App\Models\Template;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TemplateService
{
    /**
     * Retrieves a paginated list of templates.
     *
     * @param int $limit The maximum number of templates to retrieve. Defaults to 0, which retrieves all templates.
     * @return LengthAwarePaginator A paginator instance containing the requested templates.
     */
    public function getPaginated($limit = 0): LengthAwarePaginator
    {
        $templates = Template::query()
            ->orderBy('id', 'desc');

        return $templates->paginate($limit)
            ->appends(request()->query());
    }

    /**
     * Retrieves a collection of templates.
     *
     * @return Collection A collection of templates.
     */
    public function get(): Collection
    {
        $templates = Template::query()
            ->orderBy('id', 'desc');

        return $templates->get();
    }

    /**
     * Find a template by its ID.
     *
     * @param int $templateId The ID of the template.
     * @return Template|null The found template, or null if not found.
     */
    public function findById(int $templateId): Template|null
    {
        $template = Template::query()
            ->where('id', $templateId);

        return $template->first();
    }

    /**
     * Create a new template.
     *
     * @param array $data The data to create the template with.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Template The newly created template.
     */
    public function create(array $data): Template
    {
        $this->_uploadFile($data);
        return DB::transaction(function () use ($data) {
            $template = Template::create($data);
            return $template;
        });
    }

    /**
     * Updates a template with new data and returns the updated template.
     *
     * @param Template $template The template to update.
     * @param array $data The new data for the template.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Template The updated template.
     */
    public function update(Template $template, array $data): Template
    {
        $this->_uploadFile($data);
        $oldImage = $template->image;
        $oldThumbnail = $template->thumbnail;
        $result =  DB::transaction(function () use ($template, $data) {
            return $template->update($data);
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

        return $template->refresh();
    }

    /**
     * Deletes a template.
     *
     * @param Template $template The template to be deleted
     * @throws Exception if an error occurs during the deletion process
     * @return bool|null True if the template was successfully deleted, null if an error occurred
     */
    public function delete(Template $template): bool|null
    {
        $delete =  DB::transaction(function () use ($template) {
            return $template->delete();
        });

        if ($delete) {
            Storage::disk('public')->delete($template->image);
            Storage::disk('public')->delete($template->thumbnail);
        }

        return $delete;
    }

    /**
     * Uploads a file and updates the data array with the file paths.
     *
     * @param array &$data The data array to update.
     * @throws Some_Exception_Class Exception thrown if the provided file is not an instance of UploadedFile.
     * @return void
     */
    private function _uploadFile(array &$data)
    {
        if (!(isset($data['image']) && $data['image'] instanceof UploadedFile)) {
            return;
        }

        $storage = Storage::disk('public');
        $imageFile = $data['image'];
        if (mb_strpos($imageFile->getMimeType(), 'svg') === false) {
            $imagePath = 'template/' . uniqid('img_', true) . '.webp';
            $image = new ImageService($imageFile);
            $storage->put($imagePath, $image->toWebP());
            $data['image'] = $imagePath;

            $thumbnail = new ImageService($imageFile);
            $thumbnailpath = 'template/' . uniqid('thumb_', true) . '.webp';
            $storage->put($thumbnailpath, $thumbnail->cover(width: 360, height: 405));
            $data['thumbnail'] = $thumbnailpath;
        } else {
            $data['image'] = $data['thumbnail'] = $storage->putFile('template', $imageFile);
        }
    }
}
