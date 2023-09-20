<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container ">
            <div class="col-lg-12 text-center">
                <h2>Laravel 9 CRUD Example</h2>
            </div>
            <div>
                <a href="{{ route('companies.create') }}" class="btn btn-success my-3">Create Company</a>
                
            </div>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif


            <div class="row col-4">
                <form action="">
                    <strong for="date">Search by Date:</strong>
                    <input type="date" id="search" name="search" class="search form-control nowrap">
                    <button class="btn btn-primary" id="search-submit">Search</button>
                    <a href="{{ route('companies.index') }}"></a>
                    <button class="btn btn-primary" id="clear-search" value="clear">Clear</button>
                </form>

                <form action="">
                        <strong for="monthYear">Search Status in Month:</strong>
                        <input type="month" id="monthYear" name="monthYear" class="form-control" placeholder="">
                    <button class="btn btn-primary" id="search-submit">Search</button>
                    <a href="{{ route('companies.index') }}"></a>
                    <button class="btn btn-primary" id="clear-search" value="clear">Clear</button>
                </form>
            </div>


            <table class="table table-light">

                <tr>
                    <th>เลขที่</th>
                    <th>ประเภทงาน</th>
                    <th>ชื่องานที่ดำเนินการ</th>
                    <th>เวลาที่เริ่มดำเนินการ</th>
                    <th>เวลาที่เสร็จสิ้น</th>
                    <th>สถานะ</th>
                    <th>วันเวลาที่บันทึกข้อมูล</th> 
                    <th>วันเวลาที่ปรับปรุงข้อมูลล่าสุด</th>
                </tr>
                @foreach($companies as $company)
                
                    <tr class="text-center">
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->jobType }}</td>
                        <td>{{ $company->jobName }}</td>
                        <td>{{ $company->timeToStart }}</td>
                        <td>{{ $company->timeToEnd }}</td>
                        <td class="{{ $company->Count == 'Proceed' ? 'bg-primary rounded' : ($company->Count == 'Finish' ? 'bg-success rounded' : ($company->Count == 'Cancel' ? 'bg-danger rounded' : '')) }}">
                            {{ $company->Count }}
                        </td>
                        
                        <td>{{ $company->dateRecording }}</td>
                        <td>{{ $company->lastDateRecording }}</td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                
                    @endforeach
            
                </table>
                @php
                    $proceedCount = 0;
                    $finishCount = 0;
                    $cancelCount = 0;
                @endphp
                @foreach($companies as $company)
                @php
                    switch($company->Count) {
                        case 'Proceed':
                            $proceedCount++;
                            break;
                        case 'Finish':
                            $finishCount++;
                            break;
                        case 'Cancel':
                            $cancelCount++;
                            break;
                    }
                @endphp
                    @endforeach


                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <h2 class="card-title">Status</h5>
                            <p class="bg-primary rounded">proceed : {{$proceedCount}}</p>
                            <p class="bg-success rounded">finish : {{$finishCount}}</p>
                            <p class="bg-danger rounded">cancel : {{$cancelCount}}</p>
                            
                            
                        </div>
                        
                    </div>
                    
            {!! $companies->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</body>
</html>