<div>
    <a href="{{ route('page-form') }}">Create Pages</a>

    <table>
        <thead>
            <tr>
                <th>SR NO.</th>
                <th>NANE</th>
                <th>SLUG</th>
                <th>HOBBIES</th>
                <th>EDITOR</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        {{ implode(" ", json_decode($item['hobbies'])) }}
                    </td>
                    <td>{{ $item->editor }}</td>
                    <td>
                        <div>
                            <a href="{{ route('edit-page', $item->id) }}">Edit</a>
                        </div>
                        <div>
                            <form action="{{ route('delete-page', $item->id) }}" method="post">
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Are You Sure Wanted To Delete This {{ $item->name }} record')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
