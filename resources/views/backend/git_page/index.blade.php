@extends('adminlte::page')

@section('title', 'Git Monitor')

@section('content')

<div class="row">

    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>12</h3>
                <p>Repositories</p>
            </div>
            <div class="icon">
                <i class="fab fa-git-alt"></i>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Repository Status</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Branch</th>
                            <th>Last Commit</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>alamgirart.labib.work</td>
                            <td>main</td>
                            <td>5 mins ago</td>
                            <td>
                                <span class="badge badge-success">
                                    Up To Date
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

@endsection