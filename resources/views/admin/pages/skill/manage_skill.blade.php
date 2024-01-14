@extends('admin.layout.master')



@section('content')
 <!-- /.card -->
 <div class="main-wrapper">
  <!-- Page Wrapper -->
  
  <div class="page-wrapper">
      <div class="content container-fluid">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-7 col-auto">
                    <h3 class="page-title">مهاراتك  </h3>
                </div>
                  @if(count($skill) == 0)
                    <div class="col-sm-5 col">
                        <a href="{{ route('create_socialMedia') }}" class="btn btn-primary float-end ">  <i class="ti-plus"></i> قم بانشاء مهاراتك  </a>
                    </div>
                  @endif
                </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-responsive table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>مهاره 1</th>
                    <th>نسبه مهاره 1</th>
                    <th>مهاره 2</th>
                    <th>نسبه مهاره 2</th>
                    <th>مهاره 3</th>
                    <th>نسبه مهاره 3</th>
                    <th>مهاره 4</th>
                    <th>نسبه مهاره 4</th>
                    <th>مهاره 5</th>
                    <th>نسبه مهاره 5</th>
                    <th>مهاره 6</th>
                    <th>نسبه مهاره 6</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($skill as $serial=>$show)
                    <tr>
                    <td>{{ $serial +1 }}</td>
                    <td>{{$show->skill_1}}</td>
                    <td>{{$show->skill_1_percentage}}</td>
                    <td>{{$show->skill_2}}</td>
                    <td>{{$show->skill_2_percentage}}</td>
                    <td>{{$show->skill_3}}</td>
                    <td>{{$show->skill_3_percentage}}</td>
                    <td>{{$show->skill_4}}</td>
                    <td>{{$show->skill_4_percentage}}</td>
                    <td>{{$show->skill_5}}</td>
                    <td>{{$show->skill_5_percentage}}</td>
                    <td>{{$show->skill_6}}</td>
                    <td>{{$show->skill_6_percentage}}</td>
                    <th> 
                      <a href="{{ route('edit_skill',$show->id)}}" class="h4 text-success"> <i class="ti-pencil"></i>تعديل </a>
                      <a class="h4 text-danger mr-2" type="submit" onclick="deletecontent({{ $show->id  }})">
                          <i class="ti-trash"></i> حذف
                      </a>
                    <form id="delete-form-{{ $show->id  }}" 
                     action="{{ route('destroy_skill', $show->id)}}" method="get" style="display: none;">
                      @csrf
                                      
                    </form>

                  </th>
                  </tr>
                  @endforeach
                 
                 
                 
                  
                  </tbody>
              
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
  </div>
 </div>
            <!-- /.card -->
@endsection

@section('js')
<!-- DataTables  & Plugins -->
 <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deletecontent(id) {
            swal({
                title: 'هل انت متأكد ؟',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم قم بالحذف!',
                cancelButtonText: 'إلغاء',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
   </script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });



</script>
    
@endsection