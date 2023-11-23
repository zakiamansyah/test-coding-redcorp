<div class="table-responsive">
    <table id="tabledata" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date Of Birth</th>
                <th>Status</th>
                <th>Join Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($query as $row)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->dob}}</td>
                    <td>{{$row->status}}</td>
                    <td>{{$row->join_date}}</td>
                    <td>
                        <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit" onclick='editdata({{$row->id}})'>Update</a>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editdetail" onclick='editdatadetail({{$row->id}})'>Update Detail</a>
                        <a href="#" class="btn btn-danger" onclick='deletedata({{$row->id}})'>Delete</a>
                    </td>
                </tr>
            @php
                $no++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>

    <script>
        setTimeout(() => {
            $("#tabledata").DataTable()
        }, 500);
    </script>
