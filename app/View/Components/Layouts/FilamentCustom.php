<?php
namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class FilamentCustom extends Component
{
    /**
     * Title for the page.
     *
     * @var string|null
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string|null $title
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('components.layouts.filament-custom');
    }
}
