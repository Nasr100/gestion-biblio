@extends('layout.layout')
@section('content')
    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <div class="main-header container">
            <h2><u>Rentals</u></h2>
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#rentalAddModal">+ Rental</button>
        
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
                        <table class="table mb-0 listRentalsTable">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Member Name</th>
                            <th scope="col">email</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Rent Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col" >Actual Retrun Date</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $rental)
                            <tr class="align-middle">
                                <td scope="row">{{$rental->id}}</td>
                                <td class="memberName">{{$rental->member->F_Name}}</td>
                                <td class="memberEmail">{{$rental->member->Email}}</td>
                                <td>{{$rental->book->Book_Name}}</td>
                                <td>{{$rental->Rent_Date}}</td>
                                <td class="Returndate">{{$rental->Return_Date}}</td>
                                <td>
                                    @if($rental->Actual_Return_Date==null)
                                    Not Yet
                                    @else
                                    {{$rental->Actual_Return_Date}}
                                    @endif
                                </td>
                                <td>
                                    <!-- <div class="actionbtns"> -->
                                        
                                        <button type="button" class="btn btn-info m-2 rentalEditBtn" data-placement="bottom" title="Edit" 
                                        data-toggle="popover" data-bs-trigger="hover"
                                        data-id={{$rental->id}} data-rentdate={{$rental->Rent_Date}} data-actualdat{{$rental->Actual_Return_Date}}  data-returndate={{$rental->Return_Date}}
                                         booktitle="{{$rental->book->Book_Name}}"
                                         membername='{{$rental->member->F_Name}}'
                                        data-bs-toggle="modal" data-bs-target="#rentalUpdateModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </button>
                                        <a class="btn btn-danger trigger-btn del" 
                                        href="#myModal"  data-toggle="modal" id="{{$rental->id}}"data-bs-target="#myModal">
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
            {{$rentals->links()}}

        </div>

        </div>
    </section>

    <!-- start add modal -->
    <div class="modal fade " id="rentalAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Rental</h1>
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
                <label for="membername" class="form-label">Member Name</label>
                <input type="text" class="form-control" id="membername" >
                <div id="tagSearchElements" class="mb-3 ">
                    <ul class="dropdown-menu ultags" style="position:relative;width:100%;">
                    </ul>
                </div>
                </div>
                <div class="col-6">
                <label for="booktitle" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="booktitle" >
                <div id="bookSearchElements" class="mb-3 ">
                    <ul class="dropdown-menu  ulbooks" style="position:relative;">
                        {{-- li --}}
                    </ul>
                </div>
                </div>
                
            </div>
            
           
           
            </form>
        </div>
        <div class="modal-footer">
           
            <button type="button" class="btn btn-primary savebtn">Save Rent</button>
        </div>
        </div>
    </div>
    </div>
    <!-- end add modal -->
   
    <!-- start edit modal -->
    <div class="modal fade " id="rentalUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Rental</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="addErrorMsg">
    
                </div>
                
                <form action="" method="post" id="editForm">
                    @csrf
                    @method('post')
                    <input type="text" id="rentalidupdate" hidden>

                <div class="row mb-3">
                    <div class="col-6">
                    <label for="UP_membername" class="form-label">Member Name</label>
                    <input type="text" class="form-control" id="UP_membername" disabled>
                    <div id="tagSearchElements" class="mb-3 ">
                        <ul class="dropdown-menu ultags" style="position:relative;width:100%;">
                        </ul>
                    </div>
                    </div>
                    <div class="col-6">
                    <label for="UP_booktitle" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="UP_booktitle" disabled >
                    <div id="bookSearchElements" class="mb-3 ">
                        <ul class="dropdown-menu  ulbooks" style="position:relative;">
                            {{-- li --}}
                        </ul>
                    </div>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="UP_rentdate" class="form-label">Rent date</label>
                        <input type="text" class="form-control" id="UP_rentdate" >
                    </div>
                    
                    <div class="col-6">
                        <label for="UP_returndate" class="form-label">Return Date</label>
                        <input type="text" class="form-control" id="UP_returndate">
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="UP_actualreturndate" class="form-label">Actual Return Date</label>
                        <input type="text" class="form-control" id="UP_actualreturndate">
                    </div>
                </div>
                
               
               
                </form>
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-primary editbtn">Update Rent</button>
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
                <div style="display: none;">
                    <input type="text" id="delId">
                </div>
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
                <button type="button" class="btn btn-danger deletebtn" >Delete</button>
            </div>
        </div>
    </div>
    </div>     
    <!-- ende delete modal -->
    <script src="js/rental.js"></script>
@endsection