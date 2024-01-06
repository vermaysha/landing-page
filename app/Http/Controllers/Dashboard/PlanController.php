<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\PlanService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Constructor for the class.
     *
     * @param PlanService $planService The PlanService instance.
     */
    public function __construct(
        private readonly PlanService $planService
    ) {}

    /**
     * Retrieves the paginated plans and renders the index view.
     *
     * @param Request $request The request instance.
     * @return View The rendered view.
     */
    public function index(Request $request): View
    {
        $plans = $this->planService->getPaginated();
        return view('dashboard.plan.index', compact('plans'));
    }

    /**
     * Toggles the popularity status of a plan.
     *
     * @param Request $request The HTTP request object.
     * @param int $planId The ID of the plan to toggle.
     * @return RedirectResponse The redirect response.
     */
    public function togglePopular(Request $request, int $planId): RedirectResponse
    {
        $plan = $this->planService->findById($planId);

        if (empty($plan)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Plan not found']);
        }

        $this->planService->togglePopular($plan);

        return redirect()
            ->back()
            ->with('success', 'Plan updated successfully');
    }

    /**
     * Toggles the "show on homepage" flag for a plan.
     *
     * @param Request $request The HTTP request object.
     * @param int $planId The ID of the plan to toggle.
     * @throws \Exception If the plan is not found.
     * @return RedirectResponse The redirect response after toggling.
     */
    public function toggleShowOnHomepage(Request $request, int $planId): RedirectResponse
    {
        $plan = $this->planService->findById($planId);

        if (empty($plan)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Plan not found']);
        }

        $this->planService->update($plan, [
            'plan' => ['show_on_homepage' => $request->has('show_on_homepage')],
        ]);

        return redirect()
            ->back()
            ->with('success', 'Plan updated successfully');
    }

    /**
     * Store the data from the request and create a new plan.
     *
     * @param Request $request The HTTP request object.
     * @throws \Illuminate\Validation\ValidationException If the validation fails.
     * @return \Illuminate\Http\RedirectResponse The redirect response to the previous page with a success message.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'nullable',
            'show_on_homepage' => 'nullable',
            'icon_file' => 'required|image',
            'items.*.title' => 'required',
            'items.*.checked' => 'nullable',
        ]);

        $items = [];

        foreach ($data['items'] as $item) {
            $items[] = [
                'content' => $item['title'],
                'is_checked' => isset($item['checked'])
            ];
        }

        $plan = [
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'price' => $data['price'],
            'show_on_homepage' => isset($data['show_on_homepage']),
        ];

        if ($request->hasFile('icon_file')) {
            $plan['icon_file'] = $request->file('icon_file');
        }

        $this->planService->store([
            'plan' => $plan,
            'items' => $items,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Plan created successfully');
    }

    /**
     * Deletes a plan based on the given plan ID.
     *
     * @param Request $request The request object.
     * @param int $planId The ID of the plan to delete.
     * @throws Some_Exception_Class If the plan is not found.
     * @return RedirectResponse The redirect response after the plan is deleted.
     */
    public function delete(Request $request, int $planId): RedirectResponse
    {
        $plan = $this->planService->findById($planId);

        if (empty($plan)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Plan not found']);
        }

        $this->planService->delete($plan);

        return redirect()
            ->back()
            ->with('success', 'Plan ' . $plan->title . ' deleted successfully');
    }

    /**
     * Updates a plan based on the given request and plan ID.
     *
     * @param Request $request The HTTP request object.
     * @param int $planId The ID of the plan to be updated.
     * @throws Some_Exception_Class Description of exception.
     * @return RedirectResponse The response object with a redirect back to the previous page and a success message.
     */
    public function update(Request $request, int $planId)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'nullable',
            'show_on_homepage' => 'nullable',
            'icon_file' => 'nullable|image',
            'items.*.title' => 'required',
            'items.*.checked' => 'nullable',
        ]);

        $plan = $this->planService->findById($planId);

        if (empty($plan)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Plan not found']);
        }

        $items = [];

        foreach ($data['items'] as $item) {
            $items[] = [
                'content' => $item['title'],
                'is_checked' => isset($item['checked'])
            ];
        }

        $data = [
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'price' => $data['price'],
            'show_on_homepage' => isset($data['show_on_homepage']),
        ];

        if ($request->hasFile('icon_file')) {
            $data['icon_file'] = $request->file('icon_file');
        }

        $this->planService->update($plan, [
            'plan' => $data,
            'items' => $items,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Plan updated successfully');
    }
}
