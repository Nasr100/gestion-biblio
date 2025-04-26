@extends('layout.layout')
@section('content')
<div class="home-content">
    <i class='bx bx-menu' ></i>
    <div class="main-header container">
        <h2><u>Dashboard</u></h2>
    </div>
</div>
<div class="container">
    <div class="dash-container">
        <div class="count-conatiner d-flex">
          

        </div>
        <div class="charts-container col-12 d-flex mt-5">
            <div class="book-chart col-5">
                <div class="p-3 ms-2 text-center ">
                    <h3>Most rented Books</h3>
                </div>
                <table class="table table-light book-chart-table">
                  
                </table>
            </div>
            <div class="most-members col-5">
                <div class="p-3 ms-2 text-center">
                    <h3>Most Members</h3>
                </div>
                <table class="table table-light most-members-table">
                   
                </table>
            </div>
            
        </div>
        <div class="most-container">
            
        </div>
    </div>
</div>


<script src="js/board.js"></script>

@endsection