@php
// Ubah datetime ke format date dan time
$date = \Carbon\Carbon::parse($event->date_time)->format('Y-m-d');
$time = \Carbon\Carbon::parse($event->date_time)->format('H:i');
@endphp
<x-sidebar.layout :title="$title" :active="$active">
    @if (session()->has('success'))
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="alert alert-success col-lg-12 mt-4" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="mx-auto max-w-7xl">
        <div class="alert alert-error col-lg-12 mt-4" role="alert">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
    </div>
    @endif
    {{-- Konten --}}
    <div class="px-4 mx-auto max-w-4xl p-32">
        <a href="{{ route('event.manage') }}" class="text-hijaumuda"><i class="fa-solid fa-arrow-left"></i>
            Kembali</a>
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Event</h2>
        {{-- form --}}
        <form method="post" action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Event</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tulis nama event..." value="{{ old('title', $event->title) }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload
                        gambar (max.5mb)</label>
                    <input
                        class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        id="image" name="image" type="file">
                </div>
                <div class="sm:col-span-2">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category" name="category" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled>Pilih Kategori</option>
                        <option value="Seminar" {{ $event->category == 'Seminar' ?
                            'selected' : '' }} >Seminar</option>
                        <option value="Volunteer" {{ $event->category == 'Volunteer' ?
                            'selected' : '' }}>Volunteer
                        </option>
                        <option value="Kolaborasi" {{ $event->category == 'Kolaborasi' ?
                            'selected' : '' }}>Kolaborasi</option>
                        <option value="Pameran" {{ $event->category == 'Pameran' ?
                            'selected' : '' }}>Pameran</option>
                        <option value="Talk Show" {{ $event->category == 'Talk Show' ?
                            'selected' : '' }}>Talk Show
                        </option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="description" name="description" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tulis Deskripsi Acara.." required></textarea>
                </div>
                <div class="sm:col-span-2">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                        Event</label>
                    <input type="text" name="location" id="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tulis lokasi event..." value="{{ old('location', $event->location) }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="penyelenggara"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penyelenggara
                        Event</label>
                    <input type="text" name="penyelenggara" id="penyelenggara"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tulis penyelenggara event..."
                        value="{{ old('penyelenggara',$event->penyelenggara) }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="contact_person"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Narahubung
                        Event</label>
                    <input type="text" name="contact_person" id="contact_person"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tulis Narahubung event..."
                        value="{{ old('contact_person', $event->contact_person) }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="contact_person_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Narahubung
                        Event</label>
                    <input type="text" name="contact_person_number" id="contact_person_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tulis Nomer Narahubung event..."
                        value="{{ old('contact_person_number', $event->contact_person_number) }}" required>
                </div>

                <div class="sm:col-span-2">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Event</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker id="date" type="text" name="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date" value="{{ old('date', $date) }}">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                        Event (Waktu Indonesia Barat)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="time" id="time" name="time"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('time', $time) }}" />
                    </div>
                </div>
            </div>
            <button type="submit"
                class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Update Event
            </button>
        </form>
    </div>
</x-sidebar.layout>