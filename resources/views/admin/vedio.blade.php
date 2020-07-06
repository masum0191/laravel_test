@extends('layouts.admin')
@section('content')

@include('partial.formerror')

@include('partial.message')


<section class="content">

    <h4><a href="{{url('vedio/create')}}" class="btn btn btn-sm btn-info">Add Vedio</a></h4>

    <!-- /.card-header -->
    <table class="table table-hover">
        <thead>
            <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Rendering engine: activate to sort column ascending">Title</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Browser: activate to sort column descending" aria-sort="ascending">Description</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending" style="">Images</th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending" style="">Vedio</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending" style="">Status</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending" style="">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($vedioes as $vedio)
            <tr>
                <td>{{$vedio->title}}</td>
                <td>{{$vedio->des}}</td>
                <td> <img src="{{asset('assets/post/upload/'.@$vedio->img)}}" height="100px" alt=""> </td>
                @php 
                $vedio_name = $vedio->vedio_url
                @endphp
                <td><?php echo $vedio_name; ?> </td>
                <td>
                    <?php if($vedio->status==0){?><span class="btn btn-sm btn-danger">Unpublish</span>
                    <?php }
                else{ ?>
                    <span class="btn btn-sm btn-success">Publish</span>
                    <?php  
                }?>
                </td>
                <td>
                    <?php if($vedio->status==0){?>
                    <button type="button" class="btn btn-secondary btn-circle approved" mid="{{$vedio->id}}"><i
                            class="fa fa-check"></i> </button> <?php }
                    else{ ?>
                    <button type="button" class="btn btn-secondary btn-circle notapproved" mid="{{$vedio->id}}"><i
                            class="fa fa-times"></i> </button>
                    <?php

                    }

                     ?>
                </td>
            </tr>
            @endforeach

        </tbody>


    </table>
    <!-- /.row -->
</section>
@endsection
@section('js')

<script>
$(document).ready(function() {
    // alert("ok");
    //header for csrf-token is must in laravel
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //
    var url = "{{URL::to('/')}}";
    $(".approved").click(function() {
        if (confirm('Are you sure?')) {
            $managerid = $(this).attr('mid');
            // console.log($managerid);
            $.ajax({
                type: "post",
                url: url + '/setvedioapproval',
                data: {
                    id: $managerid,
                    action: "publish"
                },
                dataType: "json",
                success: function(d) {
                    alert(d.message);
                    location.reload();
                }
            });
        }
        return false;
    });

    $(".notapproved").click(function() {
        if (confirm('Are you sure?')) {
            $managerid = $(this).attr('mid');

            $.ajax({
                type: "post",
                url: url + '/setvedioapproval',
                data: {
                    id: $managerid,
                    action: "unpublish"
                },
                dataType: "json",
                success: function(d) {
                    alert(d.message);
                    location.reload();
                }
            });
        }
        return false;
    });
});
</script>
@endsection