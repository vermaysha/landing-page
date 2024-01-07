<?php

namespace App\Http\Controllers;

use App\Services\PlanService;
use App\Services\PortfolioService;
use App\Services\TemplateService;
use App\Services\TestimonialService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Constructor for the class.
     *
     * @param PlanService $planService The PlanService instance.
     * @param PortfolioService $portfolioService The PortfolioService instance.
     * @param TestimonialService $testimonialService The TestimonialService instance.
     */
    public function __construct(
        private readonly PlanService $planService,
        private readonly PortfolioService $portfolioService,
        private readonly TestimonialService $testimonialService,
        private readonly TemplateService $templateService,
    ) {
    }

    /**
     * Retrieves the home view.
     *
     * @param Request $request The request object.
     * @return View The rendered home view.
     */
    public function home(Request $request): View
    {
        $pricings = $this->planService->getActive();
        $testimonials = $this->testimonialService->getAll();

        return view('landing-page.home.home', compact('pricings', 'testimonials'));
    }

    /**
     * Retrieves the portfolio data and tags, and renders the portfolio view.
     *
     * @param Request $request The HTTP request object.
     * @throws \Some_Exception_Class Description of the exception that can be thrown.
     * @return \Illuminate\Contracts\View\View The rendered portfolio view.
     */
    public function portfolio(Request $request): View
    {
        $portfolios = $this->portfolioService->get();
        $tags = $this->portfolioService->getTags();

        return view('landing-page.portfolio.portfolio', compact('portfolios', 'tags'));
    }

    /**
     * Generate the function comment for the given function body.
     *
     * @param Request $request The request object.
     * @return View The view object.
     */
    public function template(Request $request): View
    {
        $templates = $this->templateService->get();

        return view('landing-page.template.template', compact('templates'));
    }

    /**
     * Retrieves the pricing data and renders the pricing page.
     *
     * @param Request $request The HTTP request object.
     * @return View The rendered pricing view.
     */
    public function pricing(Request $request): View
    {
        $pricings = $this->planService->getActive();
        $items = $pricings->pluck('items')
            ->map(fn ($val) => collect($val)->map(fn ($val) => $val->content))
            ->flatten()
            ->unique()
            ->flip()
            ->toArray();


        foreach ($pricings as $row) {
            foreach ($row->items as $item) {
                if (isset($items[$item->content])) {
                    if (is_array($items[$item->content])) {
                        $items[$item->content][$row->id] = $item->is_checked;
                    } else {
                        $items[$item->content] = [$row->id => $item->is_checked];
                    }
                } else {
                    if (is_array($items[$item->content])) {
                        $items[$item->content][$row->id] = $item->is_checked;
                    } else {
                        $items[$item->content] = [$row->id => $item->is_checked];
                    }
                }
            }
        }

        $items = collect($items);
        $max = 0;
        $maxKeys = [];

        foreach ($items as $value) {
            if (count($value) > $max) {
                $max = count($value);
                $maxKeys = array_keys($value);
            }
        }

        foreach ($items as $key => $val) {
            if (count($val) < $max) {
                foreach ($maxKeys as $k) {
                    if (!isset($val[$k])) {
                        $val[$k] = false;
                    }
                }
                asort($val);
                $items[$key] = $val;
            }
        }

        return view('landing-page.pricing.pricing', [
            'items' => $items,
            'pricings' => $pricings,
        ]);
    }
}
