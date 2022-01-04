


<tr>
    <th scope="row">#</th>
    <td><i data-feather="minus"></i>{{$child_category->title}}</td>
    <td>{{$child_category->slug}}</td>
    <td>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-horizontal font-size-18"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" style="">
                <li><a href="{{url('admin/category/edit/'.$child_category->id)}}" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Edit</a></li>
                <li><a href="{{url('admin/category/delete/'.$child_category->id)}}" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>
            </ul>
        </div>
    </td>
</tr>
{{-- @if ($child_category->categories)

    @foreach ($child_category->categories as $childCategory)
        @include('child_category', ['child_category' => $childCategory])
    @endforeach

@endif --}}