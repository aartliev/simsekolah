@extends('template')
@section('content')

<main class="container" style="margin-top: 30px">
  <div class="p-5 rounded">
    <h1>Daftar Siswa</h1>
    <a class="btn btn-danger" href="/student/create">Tambah Siswa Baru</a>
    <hr>

    @if(session('message')!='')
      <div class="alert alert-primary" role="alert">
        {{ session('message') }}
      </div>
      @endif

    <table class="table table-bordered">
      <tr>
          <th width='20'>Nomor</th>
          <th width='50'>NIS</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th colspan="2">Action</th>
      </tr>
      @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $student->nis}}</td>
            <td>{{ $student->name}}</td>
            <td>{{ $student->birth_date}}</td>
            <td>
              <a href="/student/{{ $student->id }}/edit" class="btn btn-danger">Edit</a>
            </td>
            <td>
              <form action="/student/{{ $student->id }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
  </div>
</main>
@endsection
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>
