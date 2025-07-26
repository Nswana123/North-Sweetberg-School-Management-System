<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::active()
            ->forTarget(auth()->user()->is_staff ? 'staff' : 'students')
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
                $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('announcements.index', compact('announcements','permissions'));
    }

    public function create()
    {
            $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('announcements.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'target' => 'required|in:all,students,staff,faculty',
            'priority' => 'required|in:low,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $announcement = Announcement::create($validated + ['user_id' => auth()->id()]);

        return redirect()->route('announcements.show', $announcement)
            ->with('success', 'Announcement created successfully.');
    }

    public function show(Announcement $announcement)
    {
            $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('announcements.show', compact('announcement','permissions'));
    }

    public function edit(Announcement $announcement)
    {
            $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('announcements.edit', compact('announcement','permissions'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'target' => 'required|in:all,students,staff,faculty',
            'priority' => 'required|in:low,medium,high',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $announcement->update($validated);

        return redirect()->route('announcements.show', $announcement)
            ->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }
}