<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\student;
use App\models\jurusan;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Iluminate\Http\Response
     */
    public function index()
    {
        // return 'Hallo Peserta Diklat';
        $data['students'] = Student::all(); // select * from student
        return view('student.index',$data);
        return view ('student.index');
        
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Iluminate\Http\Response
     */
    public function create()
    {
        {
            $data['jurusan'] = Jurusan::all();
            return view('student.create',$data);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::debug($request);
        \Log::info("ini proses insert data");

        $student = new Student();
        $student->name = $request->name;
        $student->nis = $request->nis;
        $student->birth_date = $request->birth_date;
        $student->save();
        return redirect('student')->with('message','Berhasil Menambahkan Data');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        if($student==null){
            \Sentry::captureMessage('Student Dengan ID : '.$id.' Tidak Ditemukan');
            return 'Data Tidak Ditemukan';
        }else{

            $data['student'] =  $student;
            return view('student.edit',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect('student')->with('message','Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('student')->with('message','Berhasil Menghapus Data');
    }
}
