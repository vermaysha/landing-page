<?php

namespace App\Services;

use App\Models\Testimonial;
use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TestimonialService
{
    public function __construct()
    {
        //
    }

    /**
     * Retrieves a paginated list of testimonials.
     *
     * @param int $limit The maximum number of testimonials to retrieve per page (default: 10)
     * @param Closure|null $closure An optional closure to customize the testimonial query
     * @throws Some_Exception_Class A description of the exception that may be thrown
     * @return LengthAwarePaginator The paginated list of testimonials
     */
    public function getPaginated($limit = 10, Closure $closure = null): LengthAwarePaginator
    {
        $testimonials = Testimonial::query()
            ->orderBy('id', 'desc');

        if ($closure) {
            call_user_func($closure, $testimonials);
        }

        return $testimonials->paginate($limit)
            ->appends(request()->query());
    }

    /**
     * Retrieves all testimonials from the database.
     *
     * @param Closure|null $closure An optional closure to further customize the query.
     * @return Collection A collection of testimonials.
     */
    public function getAll(Closure $closure = null): Collection
    {
        $testimonials = Testimonial::query()
            ->where('is_active', true);

        if ($closure) {
            call_user_func($closure, $testimonials);
        }

        return $testimonials->get();
    }

    /**
     * Retrieves a testimonial by its ID.
     *
     * @param int $id The ID of the testimonial to retrieve.
     * @return Testimonial|null The testimonial with the specified ID, or null if not found.
     */
    public function findById(int $id): Testimonial | null
    {
        return Testimonial::query()
            ->where('id', $id)
            ->first();
    }

    /**
     * Store a new testimonial in the database.
     *
     * @param array $data The data for the testimonial.
     * @throws Exception If there is an error during the transaction.
     * @return Testimonial The newly created testimonial.
     */
    public function store(array $data): Testimonial
    {
        return DB::transaction(function () use ($data) {
            return Testimonial::create($data);
        });
    }

    /**
     * Updates a testimonial with the given data.
     *
     * @param Testimonial $testimonial The testimonial to update.
     * @param array $data The data to update the testimonial with.
     * @throws Some_Exception_Class This is thrown if there is an error updating the testimonial.
     * @return Testimonial The updated testimonial.
     */
    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        return DB::transaction(function () use ($testimonial, $data) {
            $testimonial->update($data);
            return $testimonial;
        });
    }

    /**
     * Deletes a testimonial.
     *
     * @param Testimonial $testimonial The testimonial to be deleted.
     * @throws \Exception If an error occurs during the deletion process.
     * @return bool|null Returns true if the testimonial is successfully deleted, null otherwise.
     */
    public function delete(Testimonial $testimonial): bool|null
    {
        return DB::transaction(function () use ($testimonial) {
            return $testimonial->delete();
        });
    }
}
