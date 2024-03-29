<?php

namespace App\Controllers;

use App\Models\agendaModel;
use App\Models\arsip_fotoModel;
use App\Models\bannerModel;
use App\Models\kasusModel;
use App\Models\buronModel;
use App\Models\beritaModel;
use App\Models\videoModel;
use App\Models\carouselModel;
use App\Models\navbarModel;
use App\Models\bidangModel;
use App\Models\iconModel;
use App\Models\kategori_peraturanModel;
use App\Models\kategori_profilModel;
use App\Models\kategori_saranaModel;
use App\Models\kategoriModel;
use App\Models\kepalaKejaksaanModel;
use App\Models\visi_misiModel;
use App\Models\pelayananModel;
use App\Models\pengumumanModel;
use App\Models\profilModel;
use App\Models\saranaModel;
use App\Models\strukturModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->kasus  = new kasusModel();
        $this->buron  = new buronModel();
        $this->header  = new navbarModel();
        $this->bidang  = new bidangModel();
        $this->berita  = new beritaModel();
        $this->video  = new videoModel();
        $this->carousel = new carouselModel();
        $this->kategori = new kategoriModel();
        $this->visi_misi = new visi_misiModel();
        $this->icon = new iconModel();
        $this->pelayanan = new pelayananModel();
        $this->pengumuman = new pengumumanModel();
        $this->agenda = new agendaModel();
        $this->foto = new arsip_fotoModel();
        $this->buron = new buronModel();
        $this->banner = new bannerModel();
        $this->kategori_profil = new kategori_profilModel();
        $this->profil = new profilModel();
        $this->kategori_peraturan = new kategori_peraturanModel();
        $this->kategori_sarana = new kategori_saranaModel();
        $this->sarana = new saranaModel();
        $this->struktur = new strukturModel();
        $this->kepalaKejaksaan = new kepalaKejaksaanModel();
        helper('form');

        $header = $this->header->get_header();
        $icon = $this->icon->get_icon();
        $icon_beranda = $this->icon->get_icon_beranda();
        $video_cover = $this->video->get_video_cover();
        $nama = $this->kepalaKejaksaan->get_nama();

        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        session()->set([
            'kategori' => $this->kategori->get_kategori(),
            'header' => $header['img_navbar'],
            'icon' => $icon['img_icon'],
            'icon_beranda' => $icon_beranda['img_icon'],
            'video_cover' => $video_cover['url'],
            'nama_jaksa' => $nama['nama_kepala_kejaksaan'],
        ]);
    }

    public function index()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();

        $data = [
            'title' => 'beranda',
            'jadwal' => $this->kasus->get_jadwal(),
            'perdata' => $this->kasus->get_perdata(),
            'umum' => $this->kasus->get_umum(),
            'khusus' => $this->kasus->get_khusus(),
            'header' => $this->header->get_header(),
            'carousel' =>  $this->carousel->get_img(),
            'pelayanan' => $this->pelayanan->get_data(),
            'banner' => $this->banner->get_banner(),
            'berita' => $this->berita->get_berita(),
            'video' => $this->video->get_video(),
        ];
        return view('visitor/navbar/beranda', $data);
    }

    public function get_header()
    {
        $data = $this->header->get_header();
        echo json_encode($data);
    }

    public function kontak()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $data = [
            'title' => 'kontak',
            'header' => $this->header->get_header(),
            'kategori' => $this->kategori->get_kategori(),
        ];
        return view('visitor/navbar/kontak', $data);
    }

    public function jadwal_sidang()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $jadwal = $this->kasus;
        $jadwal->where('keterangan', '-');
        $jadwal->orderBy('id_kasus', 'DESC');
        $page = $this->request->getVar('page_jadwal') ?
            $this->request->getVar('page_jadwal') : 1;
        $data = [
            'title' => 'kontak',
            'header' => $this->header->get_header(),
            'kategori' => $this->kategori->get_kategori(),
            'jadwal' => $jadwal->paginate(10, 'jadwal'),
            'pager' => $jadwal->pager,
            'page' => $page,
        ];
        return view('visitor/info_perkara/jadwal_sidang', $data);
    }
    public function pidana_khusus()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $khusus = $this->kasus;
        $khusus->where('kategori', 'Pidana Khusus');
        $khusus->where('keterangan', 'Incraht');
        $khusus->orderBy('id_kasus', 'DESC');
        $page = $this->request->getVar('page_khusus') ?
            $this->request->getVar('page_khusus') : 1;
        $data = [
            'title' => 'kontak',
            'header' => $this->header->get_header(),
            'kategori' => $this->kategori->get_kategori(),
            'khusus' => $khusus->paginate(10, 'khusus'),
            'pager' => $khusus->pager,
            'page' => $page,
        ];
        return view('visitor/info_perkara/pidana_khusus', $data);
    }

    public function pidana_umum()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $umum = $this->kasus;
        $umum->where('kategori', 'Pidana Umum');
        $umum->where('keterangan', 'Incraht');
        $umum->orderBy('id_kasus', 'DESC');
        $page = $this->request->getVar('page_umum') ?
            $this->request->getVar('page_umum') : 1;
        $data = [
            'title' => 'kontak',
            'header' => $this->header->get_header(),
            'kategori' => $this->kategori->get_kategori(),
            'umum' => $umum->paginate(10, 'umum'),
            'pager' => $umum->pager,
            'page' => $page,
        ];
        return view('visitor/info_perkara/pidana_umum', $data);
    }

    public function tata_usaha()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $datun = $this->kasus;
        $datun->where('kategori', 'Perdata Dan Tata Usaha Negara');
        $datun->where('keterangan', 'Incraht');
        $datun->orderBy('id_kasus', 'DESC');
        $page = $this->request->getVar('page_datun') ?
            $this->request->getVar('page_datun') : 1;
        $data = [
            'title' => 'kontak',
            'header' => $this->header->get_header(),
            'kategori' => $this->kategori->get_kategori(),
            'datun' => $datun->paginate(10, 'datun'),
            'pager' => $datun->pager,
            'page' => $page,
        ];
        return view('visitor/info_perkara/tata_usaha', $data);
    }

    public function bidang($id_bidang)
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $bidang = $this->bidang->get_id($id_bidang);
        $title = $this->bidang->get_title($id_bidang);
        $data = [
            'title' => $title,
            'bidang' => $bidang,
        ];
        return view('visitor/navbar/bidang', $data);
    }

    public function berita($id_berita)
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $berita = $this->berita->get_id($id_berita);
        $title = $this->berita->getJudul($id_berita);
        $data = [
            'judul' => $title,
            'berita' => $berita,
        ];
        return view('visitor/informasi/berita_tentang', $data);
    }

    public function list_berita()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $berita =  $this->berita;
        $berita->orderBy('tanggal', 'DESC');
        $data = [
            'title' => 'Berita',
            'berita' => $berita->paginate(10, 'berita'),
            'pager' => $berita->pager,
            'listBerita' => $this->berita->get_list(),
        ];
        return view('visitor/informasi/berita', $data);
    }

    public function visi_misi()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $data = [
            'title' => 'Visi dan Misi',
            'visi' => $this->visi_misi->get_visi(),
            'misi' => $this->visi_misi->get_misi(),
        ];
        return view('visitor/profil/visi_misi', $data);
    }

    public function portal()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $data = [
            'title' => 'Portal Pelayanan',
            'pelayanan' => $this->pelayanan->findAll(),
        ];
        return view('visitor/navbar/portal', $data);
    }

    public function agenda()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $agenda =  $this->agenda;
        $agenda->orderBy('tanggal_agenda', 'DESC');
        $data = [
            'title' => 'Agenda',
            'agenda' => $agenda->paginate(10, 'agenda'),
            'pager' => $agenda->pager,
        ];
        return view('visitor/informasi/agenda', $data);
    }

    public function get_agenda($id_agenda)
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $get_agenda = $this->agenda->get_id($id_agenda);
        $data =
            [
                'title' => 'Agenda',
                'agenda' => $get_agenda,
            ];
        return view('visitor/informasi/detail_agenda', $data);
    }

    public function pengumuman()
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $pengumuman =  $this->pengumuman;
        $pengumuman->orderBy('tgl_pengumuman', 'DESC');
        $data = [
            'title' => 'Pengumuman',
            'pengumuman' => $pengumuman->paginate(10, 'pengumuman'),
            'pager' => $pengumuman->pager,
        ];
        return view('visitor/informasi/pengumuman', $data);
    }

    public function get_pengumuman($id_pengumuman)
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $get_pengumuman = $this->pengumuman->get_id($id_pengumuman);
        $data =
            [
                'title' => 'Pengumuman',
                'pengumuman' => $get_pengumuman,
            ];
        return view('visitor/informasi/detail_pengumuman', $data);
    }

    public function profil($id_profil)
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();
        $get_profil = $this->profil->get_id($id_profil);
        $data = [
            'title' => 'Profil',
            'data_profil' => $get_profil,
        ];
        return view('visitor/profil/index', $data);
    }

    public function peraturan($id_kategori_peraturan)
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();

        $peraturan = $this->kategori_peraturan->get_data($id_kategori_peraturan);
        $data = [
            'title' => $this->kategori_peraturan->get_title($id_kategori_peraturan),
            'peraturan' => $peraturan,
        ];
        return view('visitor/navbar/peraturan', $data);
    }

    public function sarana($id_sarana)
    {
        $_SESSION['kategori'] =  $this->kategori->get_kategori();
        $_SESSION['agenda'] = $this->agenda->get_agenda();
        $_SESSION['pengumuman'] = $this->pengumuman->get_pengumuman();
        $_SESSION['foto'] = $this->foto->get_foto();
        $_SESSION['banner'] = $this->banner->get_banner();
        $_SESSION['buron'] = $this->buron->get_buron();
        $_SESSION['profil'] = $this->kategori_profil->get_kategori_profil();
        $_SESSION['peraturan'] = $this->kategori_peraturan->get_kategori_peraturan();
        $_SESSION['sarana'] = $this->kategori_sarana->get_kategori_sarana();
        $_SESSION['kepalaKejaksaan'] = $this->kepalaKejaksaan->get_kepala_kejaksaan();

        $get_sarana = $this->sarana->get_data($id_sarana);
        $data = [
            'title' => 'Sarana',
            'sarana' => $get_sarana,
        ];

        return view('visitor/navbar/sarana', $data);
    }

    public function struktur()
    {

        $data = [
            'title' => 'Struktur Organisasi',
            'struktur' => $this->struktur->findAll(),
        ];
        return view('visitor/profil/struktur', $data);
    }

    public function arsip_foto()
    {
        $foto = $this->foto;
        $foto->orderBy('id_arsip_foto', 'DESC');
        $data = [
            'foto' => $foto->paginate(10, 'arsip_foto'),
            'pager' => $foto->pager,
        ];
        return view('visitor/arsip/foto', $data);
    }

    public function arsip_video()
    {
        $video =  $this->video;
        $video->orderBy('id_video', 'DESC');
        $data = [
            'video' => $video->paginate(10, 'arsip_video'),
            'pager' => $video->pager,
        ];
        return view('visitor/arsip/video', $data);
    }

    public function download_pengumuman($file)
    {
        return $this->response->download("dokumen/pengumuman/$file", null);
    }
    public function download_peraturan($file)
    {
        return $this->response->download("dokumen/peraturan/$file", null);
    }
}
