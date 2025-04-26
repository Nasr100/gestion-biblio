<div class="table-responsive rounded">
    <table class="table table-striped table-hover">
    <thead>
        <tr>
        <th >Book Title</th>
        <th >Rent Date</th>
        <th >Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $bookStatus as $bookSt )
        <tr>
            <td>{{$bookSt->book->Book_Name}}</td>
            <td>{{$bookSt->Rent_Date}}</td>
            <td>
                @if ($bookSt->isReturned == 0)
                    Not Returned
                    @else
                    Returned
                @endif
                
            </td>
        </tr>
        @endforeach
        
       
    </tbody>
    </table>
</div>