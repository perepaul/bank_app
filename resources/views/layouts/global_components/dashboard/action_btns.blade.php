<button class="btn btn-sm btn-warning" onclick="launchViewModal('view',{{$user}})"><i class="fa fa-eye"></i></button>
<button class="btn btn-sm btn-success" onclick="launchEditModal('edit',{{$user}})"><i class="fa fa-edit"></i></button>
<button onclick="this.nextElementSibling.submit()" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
<form action="{{route('deleteuser',['id'=>$user->id])}}" method="POST" onsubmit="confirm('are you sure?')">
    @method('delete')
    @csrf
</form>
