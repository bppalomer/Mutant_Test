<div>
    <table>
        <thead>
            <tr>
                <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-[#1a2e05] text-xs font-semibold text-white uppercase tracking-wider">
                    ID
                </th>
                <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-[#1a2e05] text-xs font-semibold text-white uppercase tracking-wider">
                    Name
                </th>
                <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-[#1a2e05] text-xs font-semibold text-white uppercase tracking-wider">
                    Email Address
                </th>
                <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-[#1a2e05] text-xs font-semibold text-white uppercase tracking-wider">
                    User Type
                </th>
                <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-[#1a2e05] text-xs font-semibold text-white uppercase tracking-wider">
                    Update
                </th>
            </tr>

        </thead>
        <tbody>
            @foreach($userInfo as $user)
            <tr>
                <td class="text-center">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td class="text-center">{{ $user->email }}</td>
                <td class="text-center">{{ $user->usertype }}</td>
                <td class="text-center">
                    <button data-user-id="{{ $user->id }}" class="text-blue-500 hover:underline" onclick="showUpdateForm(this)">Update</button>
                </td>
                @endforeach
        </tbody>
    </table>
</div>