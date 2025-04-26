@extends('layout.layout')
@section('content')
    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <div class="main-header container">
            <h2><u>Members</u></h2>
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#memberAddModal">+ Member</button>
        
        </div>
    </div>
    <div class="container col-6 searchbar">
        <div class="input-group rounded"> 
            <input type="search" id="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
            </span>
        </div>
    </div>
    <div class="alertMsg">

    </div>
    <div class="maintable">
        <section class="intro">
            <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                    <div class="table-responsive bg-white rounded ">
                        <table class="table mb-0 listMembersTable">
                        <thead>
                            <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Tel</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member )
                            <tr class="align-middle">
                                <td scope="row"><img src="{{$member->Image}}" width="55px" height="55px" class="rounded-circle" alt=""></td>
                                <td >{{$member->id}}</td>
                                <td>{{$member->F_Name}}</td>
                                <td>{{$member->Phone_Number}}</td>
                                <td>{{$member->Email}}</td>
                                <td>
                                    <!-- <div class="actionbtns"> -->
                                        <button type="button" class="btn btn-secondary viewMemberBtn" data-placement="bottom" title="view more" data-toggle="popover" data-bs-trigger="hover" 
                                        Vid="{{$member->id}}"
                                        Vemail="{{$member->Email}}"
                                        Vimg="{{$member->Image}}"
                                        Vaddress="{{$member->Address}}"
                                        Vfullname="{{$member->F_Name}}"
                                        Vbirthdate="{{$member->Birth_Date}}"
                                        Vphonenumber="{{$member->Phone_Number}}"
                                        data-bs-toggle="modal" data-bs-target="#memberViewModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                        </button> 
                                        <button type="button" class="btn btn-info m-2 memberEditBtn" data-placement="bottom" title="Edit" 
                                        data-toggle="popover" data-bs-trigger="hover"
                                        data-id={{$member->id}}
                                        data-email={{$member->Email}}
                                        data-address={{$member->Address}}
                                        fullname="{{$member->F_Name}}"
                                        data-birthdate={{$member->Birth_Date}}
                                        data-phonenumber={{$member->Phone_Number}}
                                        data-bs-toggle="modal" data-bs-target="#memberUpdateModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </button>
                                        <a class="btn btn-danger trigger-btn delmemberid" id={{$member->id}} href="#myModal"  data-toggle="modal" data-bs-target="#myModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                    </a>
                                    <!-- </div> -->
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        <div class="container mt-2">
            {{$members->links()}}

        </div>

        </div>
    </section>

    <!-- start add modal -->
    <div class="modal fade " id="memberAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Member</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="errorMsg">

            </div>
            
            <form action="" method="post" id="addForm">
                @csrf
                @method('post')
            <div class="row mb-3">
                <div class="col-6">
                <label for="fullname" class="form-label">Full name</label>
                <input type="text" class="form-control" id="fullname" >
                </div>
                <div class="col-6">
                <label for="phonenumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phonenumber" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" >
                </div>
                <div class="col-6">
                <label for="birthdate" class="form-label">Birth date</label>
                <input type="text" class="form-control" id="birthdate" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="memberimginpu" class="form-label">Memebr Image</label>

                <div class="col-8 input-group">
                <input type="file" class="form-control" id="memberimginput">
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary savebtn">Save Member</button>
        </div>
        </div>
    </div>
    </div>
    <!-- end add modal -->
    <!--start view model -->
    <div class="modal fade modal-lg " id="memberViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <div class="memberinfo ">
                <div class="memberPic col-4">
                    <img src="" width="200px" height="200px" alt="" class="mb-1" id="memberImg">
                    <p style="color:grey ;" id="memberId"></p>
                </div>
                <div class="">
                    <h3 class="" id="memberName"></h3>
                    <h5 id="memberAddress"></h5>
                    <h6 id="memberEmail"></h6>
                    <h6 style="font-size: 17px;" id="memberPhoneNumber"></h6>
                    <p style="color: burlywood;" id="memberBirthdate"></p>
    
                </div>
                </div>
    
                <div class="row container bookStatusTable">
                
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save Member</button> -->
            </div>
            </div>
        </div>
        </div>
 
    
    <!--end view model -->

    <!-- start edit modal -->
    <div class="modal fade " id="memberUpdateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Member</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="errorMsg">

           </div>
            <form action="" method="" id="editForm">
                @csrf
                <input type="text" id="memberidupdate" hidden>
                <div class="row mb-3">
                <div class="col-6">
                <label for="UP_fullname" class="form-label">Full name</label>
                <input type="text" class="form-control" id="UP_fullname" value="">
                </div>
                <div class="col-6">
                <label for="UP_phonenumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="UP_phonenumber"value="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-7">
                <label for="UP_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="UP_email"value="" >
                </div>
                <div class="col-5">
                <label for="UP_birthdate" class="form-label">Birth date</label>
                <input type="text" class="form-control" id="UP_birthdate" value="" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <label for="UP_address" class="form-label">Adress</label>
                <input type="text" class="form-control" id="UP_address" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label for="UP_memberimginpu" class="form-label">Member Image</label>

                <div class="col-8 input-group">
                <input type="file" class="form-control" id="UP_memberimginput">
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary updatebtn">Update Member</button>
        </div>
        </div>
    </div>
    </div>
    <!-- end edit modal -->
    <!-- start delete modal -->
    <div id="myModal" class="modal fade mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <input type="text" id="delid" hidden>
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>						
                <h4 class="modal-title w-100">Are you sure?</h4>	
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger deletebtn">Delete</button>
            </div>
        </div>
    </div>
    </div>     
    <!-- ende delete modal -->
    <script src="js/members.js"></script>
@endsection