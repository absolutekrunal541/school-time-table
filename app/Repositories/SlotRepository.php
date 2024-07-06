<?php

namespace App\Repositories;

use App\Models\Slot;
use App\Repositories\Interface\SlotRepositoryInterface;

class SlotRepository implements SlotRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function all()
    {
        return Slot::all();
    }

    public function getBreakSlot()
    {
        return Slot::where('is_break', true)->first();
    }
}
