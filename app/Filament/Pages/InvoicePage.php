<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Order;

class InvoicePage extends Page
{
    public static string $view = 'filament.pages.invoice'; // Optional: If you want a custom view.
    protected static bool $shouldRegisterNavigation = false;

    public $order; // Define a property to hold the order data

    // Mount method to receive the order ID from the URL and fetch the data
    public function mount($orderId)
    {
        $this->order = Order::find($orderId);
    }

    // This method now must return a View instance, which the Filament BasePage expects
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.pages.invoice', [
            'order' => $this->order,  // Pass order data to the view
        ]);
    }
}
