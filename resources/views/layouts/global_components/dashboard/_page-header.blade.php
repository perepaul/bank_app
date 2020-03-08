  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$page_data['page'] ?? 'Dashboard'}}</h1>
    @isset($page_data)
        <a href="javascript:void(0)" class="d-none d-sm-inline-block btn  btn-primary shadow-sm" onclick="{{ $page_data['event'] }}"><i class="fas {{$page_data['btn_icon'] ?? 'fa-download'}} fa-sm text-white-50"></i> {{' '.$page_data['btn_name']??''}}</a>
    @endisset
  </div>
