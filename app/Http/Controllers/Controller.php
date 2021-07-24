<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return all locations exist location all
     *
     * @return Collection
     *
     */
    protected function getLocations() {
        return Location::all();
    }

    /**
     * Return all locations exist location all
     *
     *  @param string $template
     *
     * @param array $data
     *
     * @return View
     *
     */
    protected function returnView(string $template, array $data) {
        $data['locations'] = $this->getLocations();
        return view($template, $data);
    }
}
