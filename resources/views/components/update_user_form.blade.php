<div>
    <h2>Edit User Information</h2>
    <form id="updateForm" action="{{ route('admin.saveUpdatedUser', ['userId' => $user->id]) }}" method="POST">
        @csrf
        @method('patch')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" required>

        <label for="usertype">User Type:</label>
        <select name="usertype" id="usertype" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Update</button>
    </form>
</div>
