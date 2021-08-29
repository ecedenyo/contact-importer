<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts Imported') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right mb-4 sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <form action="{{ route('contacts.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="contactfile" id="contactfile" />
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Import</button>
                    </form>
                </div>
                
                <table class="border-collapse border mb-4" width="100%">
                    <thead>
                        <tr>
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Telephone</th>
                            <th class="border p-2">CC Last Number</th>
                            <th class="border p-2">Franchise</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Created at</th>
                            <th class="border p-2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)    
                            <tr>
                                <td class="border p-2">{{ $contact->name }}</td>
                                <td class="border p-2">{{ $contact->telephone }}</td>
                                <td class="border p-2">{{ $contact->creditcard_lastnumbers }}</td>
                                <td class="border p-2">{{ $contact->franchise }}</td>
                                <td class="border p-2">{{ $contact->email }}</td>
                                <td class="border p-2">{{ $contact->created_at }}</td>
                                <td class="border p-2"><a href="#">Details »</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
