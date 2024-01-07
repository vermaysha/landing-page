<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\PortfolioService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Constructs a new instance of the class.
     *
     * @param PortfolioService $portfolioService The portfolio service.
     */
    public function __construct(
        private readonly PortfolioService $portfolioService
    ) {}

    /**
     * Retrieves the index page for the portfolio dashboard.
     *
     * This function retrieves the paginated portfolios and the tags from the portfolio service.
     *
     * @return \Illuminate\Contracts\View\View The index view for the portfolio dashboard.
     */
    public function index(): View
    {
        $portfolios = $this->portfolioService->getPaginated();
        $tags = $this->portfolioService->getTags();

        return view('dashboard.portfolio.index', compact('portfolios', 'tags'));
    }

    /**
     * Stores the data from the request and creates a new portfolio entry.
     *
     * @param Request $request The HTTP request object.
     * @return RedirectResponse The response to redirect to the portfolio index page.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'tags' => 'required|json',
        ]);

        $data['tags'] = collect(json_decode($data['tags'], true))->pluck('value')->toArray();
        $data['slug'] = Str::slug($data['title']);

        $this->portfolioService->create($data);

        return redirect()
            ->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio added successfully');
    }

    /**
     * Updates a portfolio.
     *
     * @param Request $request The HTTP request object.
     * @param int $portfolioId The ID of the portfolio to update.
     * @throws Some_Exception_Class If the portfolio is not found.
     * @return RedirectResponse The HTTP redirect response.
     */
    public function update(Request $request, int $portfolioId): RedirectResponse {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'tags' => 'required|json',
        ]);

        $data['tags'] = collect(json_decode($data['tags'], true))->pluck('value')->toArray();
        $data['slug'] = Str::slug($data['title']);

        $portfolio = $this->portfolioService->findById($portfolioId);

        if (empty($portfolio)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Portfolio not found']);
        }

        $this->portfolioService->update($portfolio, $data);

        return redirect()
            ->back()
            ->with('success', 'Portfolio updated successfully');
    }

    /**
     * Deletes a portfolio.
     *
     * @param Request $request The HTTP request object.
     * @param int $portfolioId The ID of the portfolio to delete.
     * @return RedirectResponse The redirect response after deleting the portfolio.
     */
    public function delete(Request $request, int $portfolioId): RedirectResponse
    {
        $portfolio = $this->portfolioService->findById($portfolioId);

        if (empty($portfolio)) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Portfolio not found']);
        }

        $this->portfolioService->delete($portfolio);

        return redirect()
            ->back()
            ->with('success', 'Portfolio deleted successfully');
    }
}
