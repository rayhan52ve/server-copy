<?php

namespace App\Http\Controllers\Trash;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateTrashController extends Controller
{
    public function trash()
    {
        $states = State::onlyTrashed()->latest('id')->select(['id', 'state_name', 'state_slug', 'is_active', 'updated_at'])->paginate(30);
        return view('admin.state.trash', compact('states'));
    }

    public function restore($state_slug)
    {
        $state = State::onlyTrashed()->where('state_slug', $state_slug)->first();
        $state->restore();
        return redirect()->route('state.index')->with('message','State Restored successfully');
    }

    public function forceDelete($state_slug)
    {
        // dd($state_slug);
        $state = State::onlyTrashed()->where('state_slug', $state_slug)->first();

        $state->forceDelete();
        return redirect()->route('state.index')->with('message','State Deleted Permenantly');
    }
}
