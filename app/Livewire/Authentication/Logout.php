<?php

namespace App\Livewire\Authentication;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    /**
     * Log out the user and redirect to the homepage.
     */
    public function logout(): void
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        // Redirect ke homepage, bukan login
        $this->redirect('/');
    }

    /**
     * Render the view.
     */
    public function render(): View
    {
        return view('livewire.authentication.logout');
    }
}
