<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Edit Company</h2>
            </div>
            <div>
                <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Job Type</strong>
                            <select name="jobType" id="jobType" value="{{ $company->jobType }}">
                                <option value="Development">Development</option>
                                <option value="Test">Test</option>
                                <option value="Document">Document</option>
                            </select>
                            @error('jobType')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Job Name</strong>
                            <input type="text" name="jobName" class="form-control"value="{{ $company->jobName }}">
                            @error('jobName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Time To Start</strong>
                            <input type="time" name="timeToStart" class="form-control" value="{{ $company->timeToStart }}">
                            @error('timeToStart')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Time To End</strong>
                            <input type="time" name="timeToEnd" class="form-control" value="{{ $company->timeToEnd }}">
                            @error('timeToEnd')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Status</strong>
                            <select name="Count" id="Count" value="{{ $company->Count }}">
                                <option value="Proceed">Proceed</option>
                                <option value="Finish">Finish</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                            @error('Count')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Date and Time of Data Recording</strong>
                            <input type="datetime-local" id="dateRecording" name="dateRecording" value="{{ $company->dateRecording }}">
                            <br>
                            @error('dateRecording')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong >Latest update time </strong><p>{{$company->lastDateRecording}}</p>
                            
                            
                            <input class="hidden" type="hidden" id="lastDateRecording" name="lastDateRecording" value="{{date("Y-m-d H:i:s")}}">
                            <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>