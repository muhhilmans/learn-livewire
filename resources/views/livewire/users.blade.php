<div class="p-6">
    <h1 class="text-3xl font-bold text-center">{{ $title }}</h1>

    <p>{{ $users->count() }} users found.</p>

    <button wire:click="createUser" type="button" class="bg-blue-500 hover:bg-blue-800 text-white font-medium px-4 py-2 cursor-pointer rounded-lg my-2">Create User</button>

    <hr class="border-2 border-gray-200 my-2">
    <ul class="list-disc pl-5">
        @foreach($users as $user)
            <li>
                <span class="font-semibold">{{ $user->name }}</span> - {{ $user->email }}
            </li>
        @endforeach
    </ul>
</div>
