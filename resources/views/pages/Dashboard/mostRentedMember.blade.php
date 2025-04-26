<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Number Of books</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $mRentedmembers as $mRentedmember )
    <tr class="">
        <th scope="row">{{$mRentedmember->id}}</th>
        <td>{{$mRentedmember->F_Name}}</td>
        <td>{{$mRentedmember->book_count}}</td>
    </tr>
    @endforeach
      
      
    
    
  </tbody>