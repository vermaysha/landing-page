<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\TemplateService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Constructs a new instance of the class.
     *
     * @param TemplateService $templateService The template service.
     */
    public function __construct(
        private readonly TemplateService $templateService,
    ) {}

    /**
     * Retrieves the index view for the templates.
     *
     * @param Request $request The HTTP request object.
     * @throws \Some_Exception_Class If an error occurs while retrieving the templates.
     * @return \Illuminate\Contracts\View\View The index view for the templates.
     */
    public function index(Request $request): View
    {
        $templates = $this->templateService->getPaginated();

        return view('dashboard.template.index', compact('templates'));
    }

    /**
     * Store the data from the request and create a new template.
     *
     * @param Request $request The request object containing the data to be stored.
     * @return RedirectResponse The redirect response after storing the data.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $this->templateService->create($data);

        return redirect()
            ->back()
            ->with('success', 'Template added successfully');
    }

    /**
     * Updates a template based on the provided request data.
     *
     * @param Request $request The HTTP request object containing the data.
     * @param int $templateId The ID of the template to update.
     * @return RedirectResponse The redirect response after the update.
     */
    public function update(Request $request, int $templateId): RedirectResponse {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $template = $this->templateService->findById($templateId);

        if (empty($template)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Template not found']);
        }

        $this->templateService->update($template, $data);

        return redirect()
            ->back()
            ->with('success', 'Template updated successfully');
    }

    /**
     * Deletes a template.
     *
     * @param Request $request The HTTP request object.
     * @param int $templateId The ID of the template to be deleted.
     * @throws Some_Exception_Class If the template is not found.
     * @return RedirectResponse The HTTP redirect response.
     */
    public function delete(Request $request, int $templateId): RedirectResponse
    {
        $template = $this->templateService->findById($templateId);

        if (empty($template)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Template not found']);
        }

        $this->templateService->delete($template);

        return redirect()
            ->back()
            ->with('success', 'Template deleted successfully');
    }
}
