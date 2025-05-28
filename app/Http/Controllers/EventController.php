<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Green Events';
        $active = 'events';
        $eventUtama = Event::latest()->first();
        $events = Event::where('id', '!=', $eventUtama->id)->latest()->get();
        return view('event.index', compact('active', 'title', 'eventUtama', 'events'));
    }
    public function ajukan()
    {
        $title = 'Ajukan Event';
        $active = 'events';
        return view('event.ajukan', compact('active', 'title'));
    }
    public function simpanAjuan(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
            'description' => 'required|string',
            'location' => 'required|string',
            'penyelenggara' => 'required|string',
            'contact_person' => 'required|string',
            'contact_person_number' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Gabungkan tanggal dan waktu
        $dateTime = date('Y-m-d H:i:s', strtotime($validated['date'] . ' ' . $validated['time']));

        // Upload file jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }
        $data = [
            'id' => Str::uuid(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'location' => $validated['location'],
            'penyelenggara' => $validated['penyelenggara'],
            'contact_person' => $validated['contact_person'],
            'contact_person_number' => $validated['contact_person_number'],
            'date_time' => $dateTime,
            'user_id' => Auth::id(), // Pastikan user sudah login
        ];
        // Simpan data
        DB::table('ajuan_events')->insert($data);

        return redirect()->route('event.index')->with('success', 'Event berhasil diajukan!');
    }

    public function manage()
    {
        $title = 'Manage Events';
        $active = 'manage-event';
        $events = Event::latest()->get();
        return view('event.manage', compact('active', 'title', 'events'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Green Events';
        $active = 'create-events';
        return view('event.create', compact('active', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5',
            'description' => 'required|string',
            'location' => 'required|string',
            'penyelenggara' => 'required|string',
            'contact_person' => 'required|string',
            'contact_person_number' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Gabungkan tanggal dan waktu
        $dateTime = date('Y-m-d H:i:s', strtotime($validated['date'] . ' ' . $validated['time']));

        // Upload file jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }
        $data = [
            'id' => Str::uuid(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'location' => $validated['location'],
            'penyelenggara' => $validated['penyelenggara'],
            'contact_person' => $validated['contact_person'],
            'contact_person_number' => $validated['contact_person_number'],
            'date_time' => $dateTime,
            'user_id' => Auth::id(), // Pastikan user sudah login
        ];
        // Simpan data
        DB::table('events')->insert($data);

        return redirect()->route('event.manage')->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $title = 'Green Events';
        $active = 'events';
        return view('event.show', compact('active', 'title', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
