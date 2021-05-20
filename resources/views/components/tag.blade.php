<tr>
    <th>{{ $tag->id }}<th>
    <td>{{ $tag->name }}</td>
    <td>
        @if ($type === 'index')
        <a href="{{ route('tag.show', ['tag' => $tag->id]) }}"
            class="btn btn-primary">Show More</a>
        @elseif ($type === 'show')
        <div>
            <a href="{{ route('tag.edit', ['tag' => $tag->id]) }}" class="btn btn-success">Edit</a>
            <form class="d-inline pr-4 " action="{{ route('tag.delete', ['tag' => $tag->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('tag.index') }}" class="btn btn-primary">Back</a>
        </div>
        @endif
    </td>
</tr>
            
