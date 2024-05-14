@extends('layouts.header')
@section('content')
<!-- Include Popper.js -->
  <main class="sm:container sm:mx-auto sm:mt-10">
      <div class="w-full sm:px-6">

          <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            <style>
                /* *{
                padding: 2px;
                margin: 2px;
                } */
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
                #th1{
                color: #6c757d; text-align: center;text-transform: uppercase;
                }
                .border {
                border: 2px indigo dashed;
                }
                .d-table {
                display:table;
                }
                .d-table-cell {
                display:table-cell;
                }

                .w-100 {
                width: 100%;
                }

                .tar {
                text-align: right;
                }
                /* .btn{
                color: white; background: royalblue; height: 60px; width: 160px; font-weight: bold; font-size: 20px; border-radius: 7px
                } */
            </style>

              <div class="card-header text-center font-weight-bold">

                <h2>USERS</h2>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> Filter</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                 <input id="text" type="text" class="form-control" name="txtsearch" placeholder="Search">
                                </div>
                             </form>
                        </div>

                      </div>
                    </div>
                  </div>

                <div class="row d-flex flex-row-reverse">
                    <a  style="color:white; text-decoration:none;" class="btn btn-success" href="{{ url('adduser') }}"><i class="fa fa-plus"></i> New</a>&nbsp;
                    <a  style="color:white; text-decoration:none;" href="" class="btn btn-success"><i class="fa fa fa-eye"></i> View</a>&nbsp;
                    <a class="btn btn-primary"  style="color:white; text-decoration:none;" data-toggle='modal' data-target='#exampleModal' data-backdrop='static' data-keyboard='false'><i class="fa fa-search"></i> Find</a>&nbsp;
                </div>



                @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>

                @endif
              </div>



            <table>
              <tr>
                <th id="th1" style="text-align: center !important;" >Name</th>
                <th id="th1" style="text-align: left !important;" >Role</th>
                <th id="th1" style="text-align: left !important;" >A/C Heads</th>
                <th id="th1" style="text-align: left !important;" >Sub Div</th>
                <th id="th1" style="text-align: left !important;" >Work ID</th>
                <th id="th1">Action</th>
              </tr>
              <?php $initval = 1;?>
              @foreach($users as $user)
                <tr>
                    <th style="text-align: center">{{ ucfirst($user['name']).' | '.$user['Usernm']}}</th>
                    <th>{{ $user['usertypes']}}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align: center">

                    <form id="deleteForm_{{ $user['id'] }}" method="POST" action="{{ route('RouteDeleteUser', ['id' => $user['id']]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="button" onclick="return confirmDelete('{{ $user['id'] }}');">
                            <i class='fa fa-fw fa-trash' style='font-size:24px; color:red;'></i>
                        </button>
                    </form>
                        <a style="color:white; text-decoration:none;" class="btn btn-success" href="{{ url('edituser/'.$user['id']) }}"><i class="fa fa-pencil"></i> Edit</a>&nbsp;
                    </th>
                    </th>
                </tr>
                <?php $initval++;?>
              @endforeach
            </table>
            {{-- {{ $users->links()}} --}}
            <script>
                $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();
                });
                
                                function confirmDelete(userId) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this user!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user clicks 'Yes, delete it!', submit the form
                            document.getElementById('deleteForm_' + userId).submit();
                        }
                    });
                    // Prevent default action
                    return false;
                }
                </script>
          </section>
      </div>
  </main>
  @endsection
