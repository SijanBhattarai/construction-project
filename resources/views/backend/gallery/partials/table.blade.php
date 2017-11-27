<tr>
    <td>{{ str_limit($gallery->name) }}</td>
    <td class="text-center">
        <span class="badge">{{ $gallery->is_published ? 'Yes' : 'No' }}</span>


    <td class="text-right">
        <a href="{{route('gallery.edit', $gallery->slug)}}" class="btn btn-flat btn-primary btn-xs">
            Edit
        </a>
        <button type="button" data-url="{{route('gallery.destroy', $gallery->slug)}}" class="btn btn-flat btn-primary btn-xs item-delete">
            Delete
        </button>
    </td>
</tr>