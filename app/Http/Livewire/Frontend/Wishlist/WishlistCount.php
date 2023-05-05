<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wlCount;

    protected $listeners = ['wishlistUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if (Auth::check())
        {
            return $this->wlCount = Wishlist::where('user_id', auth()->user()->id)->count();
        }
        else
        {
            return $this->wlCount = 0;
        }
    }

    public function render()
    {
        $this->wlCount = $this->checkWishlistCount();
        return view('livewire.frontend.wishlist.wishlist-count', [
            'wlCount' => $this->wlCount
        ]);
    }
}
