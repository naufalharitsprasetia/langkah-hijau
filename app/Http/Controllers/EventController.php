<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\AjuanEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5024',
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
        // Tambah 20 green_points
        $user = Auth::user();
        User::where('id', $user->id)->increment('green_points', 20);
        // $user->increment('green_points', 20);

        return redirect()->route('event.index')->with('success', 'Event berhasil diajukan! Kamu mendapatkan 20 Green Points 🎉!');
    }

    public function manage()
    {
        $title = 'Manage Events';
        $active = 'manage-event';
        $events = Event::latest()->get();
        return view('event.manage', compact('active', 'title', 'events'));
    }

    public function listAjuan()
    {
        $title = 'Manage Events';
        $active = 'manage-event';
        $ajuan_events = AjuanEvent::latest()->get();
        return view('event.listAjuan', compact('active', 'title', 'ajuan_events'));
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
            'image' => 'image|mimes:jpg,jpeg,png,webp|max:5024',
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
    public function accAjuan($id)
    {
        // Cari data ajuan event
        $ajuan = AjuanEvent::findOrFail($id);

        // Salin data ke tabel events
        $data = $ajuan->toArray();
        $data['id'] = Str::uuid(); // Buat ID baru
        $data['created_at'] = now();
        $data['updated_at'] = now();

        Event::insert($data);

        // Hapus dari tabel ajuan jika sudah di-acc (opsional)
        $ajuan->delete();

        return redirect()->route('event.manage')->with('success', 'Ajuan Event berhasil ditambahkan ke event!');
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
        $title = 'Edit Green Events';
        $active = 'edit-events';
        return view('event.edit', compact('active', 'title', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5024',
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
        // Siapkan data yang akan diperbarui
        $data = [
            'id' => Str::uuid(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'penyelenggara' => $validated['penyelenggara'],
            'contact_person' => $validated['contact_person'],
            'contact_person_number' => $validated['contact_person_number'],
            'date_time' => $dateTime,
            'user_id' => Auth::id(), // Pastikan user sudah login
        ];

        // Cek apakah ada file gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        // Update data produk di database
        DB::table('events')->where('id', $event->id)->update($data);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('event.manage')->with('success', 'event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (!$event) {
            return redirect()->back()->withErrors('event not found!');
        }

        // Hapus gambar dari storage jika ada
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        // Hapus produk dari database
        DB::table('events')->where('id', $event->id)->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('event.manage')->with('success', 'event deleted successfully!');
    }
    public function destroyAjuan(AjuanEvent $event)
    {
        if (!$event) {
            return redirect()->back()->withErrors('ajuan event not found!');
        }

        // Hapus gambar dari storage jika ada
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        // Hapus produk dari database
        DB::table('ajuan_events')->where('id', $event->id)->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('event.listAjuan')->with('success', 'ajuan event deleted successfully!');
    }
}