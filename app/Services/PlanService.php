<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlanService
{
    /**
     * Find a plan by its ID.
     *
     * @param int $id The ID of the plan.
     * @return Plan|null The found plan or null if not found.
     */
    public function findById(int $id): Plan|null
    {
        return Plan::query()
            ->with('items')
            ->where('id', $id)
            ->first();
    }

    /**
     * Get a paginated result of plans.
     *
     * @param int $limit The number of plans to retrieve per page. Default is 10.
     * @return \Illuminate\Pagination\LengthAwarePaginator The paginated result of plans.
     */
    public function getPaginated($limit = 10): LengthAwarePaginator
    {
        $plan = Plan::query()
            ->orderBy('id', 'desc')
            ->with('items');

        return $plan->paginate($limit)
            ->appends(request()->query());
    }

    /**
     * Retrieves the active plans with their associated items.
     *
     * @return Collection The collection of active plans.
     */
    public function getActive(): Collection
    {
        $plan = Plan::query()
            ->with('items')
            ->where('show_on_homepage', true)
            ->orderBy('id', 'asc');

        return $plan->get();
    }

    /**
     * Update a plan with the given data.
     *
     * @param Plan $plan The plan to update.
     * @param array $data The data to update the plan with.
     * @throws Some_Exception_Class In case of an exception.
     * @return Plan The updated plan.
     */
    public function update(Plan $plan, array $data): Plan
    {
        $this->_uploadFile($data);
        $oldFile = $plan->icon_file;
        $result =  DB::transaction(function () use ($plan, $data) {
            if (isset($data['items'])) {
                $plan->items()->delete();
                $plan->items()->createMany($data['items']);
            }
            return $plan->update($data['plan']);
        });

        if ($result) {
            if (isset($data['plan'])) {
                if (
                    isset($data['plan']['icon_file']) &&
                    $data['plan']['icon_file'] instanceof UploadedFile &&
                    is_string($data['plan']['icon_file'])
                ) {
                    Storage::disk('public')->delete($oldFile);
                }
            }
        }

        return $plan->refresh();
    }

    /**
     * Toggles the popularity status of a plan.
     *
     * @param Plan $plan The plan to toggle the popularity status for.
     * @throws \Throwable
     * @return Plan The updated plan with the new popularity status.
     */
    public function togglePopular(Plan $plan): Plan
    {
        return DB::transaction(function () use ($plan) {
            Plan::query()->update(['is_popular' => false]);

            $plan->update(['is_popular' => true]);

            return $plan->refresh();
        });
    }

    /**
     * Deletes a plan from the database.
     *
     * @param Plan $plan The plan to be deleted.
     * @throws \Exception If an error occurs during the deletion process.
     * @return bool|null Returns true if the deletion is successful, null otherwise.
     */
    public function delete(Plan $plan): bool|null
    {
        $delete = DB::transaction(function () use ($plan) {
            $plan->items()->delete();
            return $plan->delete();
        });

        if ($delete) {
            Storage::disk('public')->delete($plan->icon_file);
        }

        return $delete;
    }

    /**
     * Store a new plan in the database.
     *
     * @param array $data The data for creating the plan.
     * @throws Exception If there is an error during the database transaction.
     * @return Plan The newly created plan.
     */
    public function store(array $data): Plan
    {
        $this->_uploadFile($data);

        return DB::transaction(function () use ($data) {
            $plan = Plan::create($data['plan']);
            $plan->items()->createMany($data['items']);
            return $plan;
        });
    }

    /**
     * Uploads a file and updates the 'icon' field of the 'plan' array in the given data.
     *
     * @param array &$data The data array to update.
     * @throws None
     * @return void
     */
    private function _uploadFile(array &$data): void
    {
        if (isset($data['plan']['icon_file']) && $data['plan']['icon_file'] instanceof UploadedFile) {
            $iconFile = $data['plan']['icon_file'];
            $storage = Storage::disk('public');

            if (mb_strpos($iconFile->getMimeType(), 'svg') === false) {
                $image = new ImageService($iconFile);
                $iconFile = $image->cover(200);
                $path = 'plans/' . uniqid('plan_', true) . '.webp';
                $storage->put($path, $iconFile);
                $data['plan']['icon_file'] = $path;
            } else {
                $data['plan']['icon_file'] = $storage->putFile('plans', $iconFile);
            }
        }
    }
}
