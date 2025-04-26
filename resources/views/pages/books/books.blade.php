@extends('layout.layout')
@section('content')
<div class="home-content">
    <i class='bx bx-menu' ></i>
    <div class="main-header container">
        <h2><u>Books</u></h2>
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#bookAddModal">+ Books</button>
    
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
                    <table class="table mb-0 listBooksTable">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Isbn</th>
                        <th scope="col">Author</th>
                        <th scope="col">Published Year</th>
                        <th scope="col">Edition</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book )
                        <tr class="align-middle">
                            <td scope="row">{{$book->id}}</td>
                            <td>{{$book->Book_Name}}</td>
                            <td>{{$book->Isbn}}</td>
                            <td>{{$book->Author}}</td>
                            <td>{{$book->Pub_Date}}</td>
                            <td>{{$book->Edition}}</td>
                            <td>
                                @foreach ($book->categories as $cat)
                                    <li type="button" class="badge rounded-pill me-2 bg-warning text-dark tagli">{{$cat->Category_Name}}</li>
                                @endforeach
                            </td>
                            <td>
                                {{-- <button type="button" class="btn btn-secondary memberViewBtn" data-placement="bottom" title="view more"
                                    id="{{$book->id}}"
                                    isbn="{{$book->Isbn}}"
                                    author="{{$book->Author}}"
                                    btitle="{{$book->Book_Name}}"
                                    pubyear="{{$book->Pub_Date}}"
                                    edition="{{$book->Edition}} "
                                    toggle="popover" data-bs-trigger="hover" data-bs-toggle="modal" data-bs-target="#BookViewModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye " viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </button> --}}
                                
                                    <button type="button" class="btn btn-info m-2 bookEditBtn" data-placement="bottom" title="Edit" 
                                    data-toggle="popover" data-bs-trigger="hover"
                                    data-id={{$book->id}}
                                    data-isbn={{$book->Isbn}}
                                    data-author={{$book->Author}}
                                    btitle="{{$book->Book_Name}}"
                                    data-pubyear={{$book->Pub_Date}}
                                    data-edition={{$book->Edition}}
                                    data-bs-toggle="modal" data-bs-target="#BookUpdateModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                        </svg>
                                    </button>
                                    <a class="btn btn-danger trigger-btn bookdelid" id="{{$book->id}}" href="#myModal"  data-toggle="modal" data-bs-target="#myModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
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
        {{$books->links()}}

    </div>

    </div>
</section>

 <!-- start add modal -->
 <div class="modal fade " id="bookAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Book</h1>
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
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" >
                </div>
                <div class="col-6">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <label for="pubyear" class="form-label">Published Year</label>
                <input type="text" class="form-control" id="pubyear" >
                </div>
                <div class="col-6">
                <label for="edition" class="form-label">Edition</label>
                <input type="text" class="form-control" id="edition" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" >
                </div>
            </div>
            <div class="row">
                       
                <div class="form-outline  mb-3 col-12 " >
                    <label class="form-label" for="categories">categories</label>
                    <div class="mb-3 col-12 categoryTags">

                    </div>
                    <input type="text" id="categories" name="categories" class="form-control bg-transparent" />
                    <div id="tagSearchElements" class="mb-3">
                        <ul class="dropdown-menu ultags" style="position:relative;width:100%;">
                            {{-- li --}}
                        </ul>
                    </div>
                    
                </div>

             </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary savebtn">Save Book</button>
        </div>
        </div>
    </div>
    </div>
    <!-- end add modal -->
     <!-- start delete modal -->
     <div id="myModal" class="modal fade " tabindex="-1" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <input type="text" id="bookid" hidden>
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
        
   

     <!-- start edit modal -->
 <div class="modal fade " id="BookUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Book</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="errorMsg">

            </div>
            
            <form action="" method="post" id="editForm">
                @csrf
                @method('post')
                <div class="col-12 mb-3">
                <label for="UP_id" class="form-label">ID</label>
                <input type="text" class="form-control" id="UP_id" readonly="readonly" disabled>
                </div>
            <div class="row mb-3">
                
                <div class="col-6">
                <label for="UP_title" class="form-label">Title</label>
                <input type="text" class="form-control" id="UP_title" >
                </div>
                <div class="col-6">
                <label for="UP_isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="UP_isbn" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <label for="UP_pubyear" class="form-label">Published Year</label>
                <input type="text" class="form-control" id="UP_pubyear" >
                </div>
                <div class="col-6">
                <label for="UP_edition" class="form-label">Edition</label>
                <input type="text" class="form-control" id="UP_edition" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <label for="UP_author" class="form-label">Author</label>
                <input type="text" class="form-control" id="UP_author" >
                </div>
            </div>
            {{-- <div class="row">
                <div class="form-outline mb-3 col-12">
                    <label class="form-label" for="categories">categories</label>
                    <div class="mb-3 col-12 categoryTags">
                    </div>
                    <input type="text" id="UP_categories" name="categories" class="form-control bg-transparent" />
                    <div id="tagSearchElements" class="mb-3">
                        <ul class="dropdown-menu ultags" style="position:relative;width:100%;">
                         
                        </ul>
                    </div>
                    
                </div>

             </div> --}}
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary updatebtn">Update Book</button>
        </div>
        </div>
    </div>
    </div>
    <!-- end add modal -->
    <script src="js/books.js"></script>
@endsection