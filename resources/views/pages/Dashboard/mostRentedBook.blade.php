<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">Rented</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $mRentedbooks as $mRentedbook )
    <tr class="">
        <th scope="row">{{$mRentedbook->id}}  </th>
        <td>{{$mRentedbook->Book_Name}}</td>
        <td>
            @if ($mRentedbook->book_count>1)
            {{$mRentedbook->book_count}} <span>times</span>
            @else
            {{$mRentedbook->book_count}} <span>time</span>
            @endif
           
            </td>
    </tr>
    @endforeach
    
    
    
  </tbody>