@extends('admin.layouts.master')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title"> all course</h2>
            <div class="col-md-12 my-4">
              <div class="card shadow">
                <div class="card-body">
                  <h5 class="card-title">courses</h5>

                  <table class="table table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th> course</th>
                        <th> actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $count = 1 @endphp
                      @foreach ($Courses as $course)
                        <tr>
                            <td>{{ $course->name}}</td>
                          <td>
                            <div class="mb-2 row">
                                <div style="padding-left: 20px;padding-right: 20px">
                                    <a href="{{route('courses.edit', $course->id)}}" class="btn mb-2 btn-outline-primary">edit</a>
                                </div>
                             <div>
                                <form method="POST" action="{{route('courses.destroy',$course->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn mb-2 btn-outline-danger" data-id data-toggle="tooltip" data-placement="bottom" title="Delete">delete</button>
                                </form>
                             </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

         </div>
     </div>
    </div>
</main>
@endsection
