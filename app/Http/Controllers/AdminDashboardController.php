<?php

namespace App\Http\Controllers;
use App\Kursus;
use App\Kuis;
use App\Video;
use App\Book;
use App\User;
use App\Result;
use App\reset;
use App\About;
use App\slide;
use Auth;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        $data_kursus    = Kursus::all();
        $data_kuis      = Kuis::all();
        $data_video     = Video::all();
        $data_buku      = Book::all();

        $data_instruktur        =   User::where('role','instruktur')->get();
        $data_siswa             =   User::where('role','siswa')->get();
        $data_user_non_acc      =   User::where('stat','0')->get();

        $belum_verif            =   User::where('email_verified_at', null)->get();
        $pengunjung             =   User::where('role','pengunjung')->get();

        $id = Auth::id();
        $kursus_user    = Kursus::where('user_id', $id)->with('profile')->get();
        
        return view('admin.dashboard.index',compact('pengunjung','belum_verif','kursus_user','data_instruktur','data_siswa','data_user_non_acc','data_kursus','data_video','data_buku','data_kuis'));
    }

    public function tentang()
    {
        $ab = About::all();
        return view('admin.about.index', compact('ab'));
    }

    public function create()
    {
        $dt = About::all();
        if (count($dt)==null) {
            # code...
            return view('admin.about.create');
        }
        else{
            $notif = array(
                'pesan-peringatan' => 'Terdapat Data Profile, Ubah data yang ada atau hapus data tersebut terlbih dahulu',                
                );
            return redirect()->back()->with($notif);
        }
        
    }

    public function store(Request $request)
    {
        $ab = new About;
        $ab->user_id = Auth::id();
        $ab->judul = $request->judul;
        $ab->konten = $request->konten;
        $ab->status = 'terbit';
        $ab->save();
        $notif = array(
            'pesan-sukses' => 'Profile tersebut berhasil tambahkan',                
            );
        return redirect('/about-us-index');

    }

    public function view()
    {

    }

    public function edit(Request $request ,$id)
    {
        
        
            $ab = About::find($id);
            return view('admin.about.edit',compact('ab'));
       
       
    }

    public function update(Request $request, $id)
    {
        About::where('id', $id)->update(
            [
                'user_id' => Auth::id(),
                'judul' => $request->judul,
                'konten' => $request->konten,
                'status' => 'terbit',
            ]
        );
        $notif = array(
            'pesan-info' => 'Profile tersebut berhasil ubah',                
            );
        return redirect('/about-us-index');
    }

    public function destroy($id)
    {
        About::find($id)->delete();
        $notif = array(
            'pesan-bahaya' => 'Profile tersebut berhasil dihapus',                
            );
                        
        return redirect()->back()->with($notif);   
    }

    public function slides()
    {
        $sl = slide::all();
        return view('admin.slide.index', compact('sl'));
    }

    public function storeslide(Request $request)
    {
        // $sl = new slide;
        // $sl -> name = $request->name;
        // $sl -> status = $request->status;
        // if($request -> hasFile('img'))
        //     {
        //         $request->file('img')->move('upload/users/comp/',$request->file('img')->getClientOriginalName());
        //         $sl->img = $request->file('img')->getClientOriginalName();
        //     }
            
        // $sl->save(); 
        $id = $request->id;
        $post           =   slide::updateOrCreate(['id' => $id],
                            [
                                'name' => $request->name,
                                'img' => $request->img,     
                                'status' => $request->status,
                            ]);
            if($request -> hasFile('img'))
            {
                $request->file('img')->move('upload/users/comp/',$request->file('img')->getClientOriginalName());
                $post->img = $request->file('img')->getClientOriginalName();
                $post->save();
            }
        $notif = array(
            'pesan-sukses' => 'Slide berhasil ditambahkan'
        );
        return redirect()->back()->with($notif);
    }

    public function dellslide(Request $request)
    {
        $id = $request->id;
        $dl = slide::find($id)->delete();

        $notif = array(
            'pesan-bahaya' => 'Slide telah dihapus'
        );
        return redirect()->back()->with($notif);

    }

    public function changestatus(Request $request)
    {
        $sl = slide::find($request->id);
        $sl->status = $request->status;
        $sl->save();

        return response()->json($request->status);
    }
    
}
