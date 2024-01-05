<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\TestimonialService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Constructs a new instance of the TestimonialService class.
     *
     * @param TestimonialService $testimonialService The testimonial service dependency.
     */
    public function __construct(
        private readonly TestimonialService $testimonialService
    ) {}

    /**
     * Retrieves and displays the testimonials in the dashboard.
     *
     * @param Request $request The HTTP request object.
     * @return View The rendered view of the testimonials index page.
     */
    public function index(Request $request): View
    {
        $testimonials = $this->testimonialService->getPaginated();

        return view('dashboard.testimonial.index', compact('testimonials'));
    }

    /**
     * Stores a new testimonial.
     *
     * @param Request $request The request object containing the form data.
     * @return RedirectResponse The redirect response after storing the testimonial.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'fullname' => 'required',
            'job_title' => 'required',
            'content' => 'required',
        ]);

        $data['is_active'] = true;

        $this->testimonialService->store($data);

        return redirect()
            ->route('dashboard.testimonial.index')
            ->with('success', 'Testimonial added successfully');
    }

    /**
     * Toggles the active state of a testimonial.
     *
     * @param Request $request The HTTP request object.
     * @param int $id The ID of the testimonial to toggle.
     * @throws
     * @return RedirectResponse The HTTP redirect response.
     */
    public function toggle(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'is_active' => 'nullable',
        ]);

        $testimonial = $this->testimonialService->findById($id);

        if (!$testimonial) {
            return redirect()
                ->route('dashboard.testimonial.index')
                ->withErrors(['error' => 'Testimonial not found']);
        }

        $isActive = $request->input('is_active');

        $this->testimonialService->update($testimonial, [
            'is_active' => $isActive == 'on',
        ]);

        return redirect()
            ->route('dashboard.testimonial.index')
            ->with('success', 'Testimonial ' .  $testimonial->fullname . ' has been ' . ($isActive ? 'activated' : 'deactivated'));
    }

    /**
     * Updates a testimonial.
     *
     * @param Request $request The request object containing the data to update the testimonial.
     * @param int $id The ID of the testimonial to update.
     * @throws Some_Exception_Class If the testimonial is not found.
     * @return RedirectResponse A redirect response to the testimonial index page with a success message.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $data = $request->validate([
            'fullname' => 'required',
            'job_title' => 'required',
            'content' => 'required',
        ]);

        $testimonial = $this->testimonialService->findById($id);

        if (!$testimonial) {
            return redirect()
                ->route('dashboard.testimonial.index')
                ->withErrors(['error' => 'Testimonial not found']);
        }

        $this->testimonialService->update($testimonial, $data);

        return redirect()
            ->route('dashboard.testimonial.index')
            ->with('success', 'Testimonial ' . $request->input('fullname') . ' updated successfully');
    }

    /**
     * Deletes a testimonial.
     *
     * @param Request $request The HTTP request object.
     * @param int $id The ID of the testimonial to be deleted.
     * @throws Some_Exception_Class If the testimonial is not found.
     * @return RedirectResponse The redirect response after deletion.
     */
    public function delete(Request $request, int $id): RedirectResponse
    {
        $testimonial = $this->testimonialService->findById($id);
        if (!$testimonial) {
            return redirect()
                ->route('dashboard.testimonial.index')
                ->withErrors(['error' => 'Testimonial not found']);
        }

        $this->testimonialService->delete($testimonial);

        return redirect()
            ->route('dashboard.testimonial.index')
            ->with('success', 'Testimonial ' . $request->input('fullname') . ' has been deleted');
    }
}
