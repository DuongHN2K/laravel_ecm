<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $wishlist_id)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlist_id)->delete();
        $this->emit('wishlistUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Đã xóa sản phẩm khỏi mục ưa thích',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()?->user()?->id)->get();
        return view('livewire.frontend.wishlist.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
