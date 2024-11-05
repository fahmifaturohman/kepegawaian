<?php

// use PhpOffice\PhpWord\PhpWord;
// use PhpOffice\PhpWord\Writer\Word2007;


class Wordsptlib
{
        
    function spt($data) {
        require_once 'vendor/autoload.php';
        //$phpWord = new PhpWord();
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('public/report/'.$data['source']);

        #detail nama petugas
        $detail_array = [];
        $no= 1;
        foreach ($data['detail'] as $key) {
            $detail_array[] = [
                'petugas' => $key->nama,
                'petugas_nip' => ($key->nip == "") ? '-':$key->nip,
                'petugas_pangkat' => ($key->pangkat == "") ? 'PPNPN':strtoupper(end(explode('(',explode("/",$key->pangkat)[0]))),
                'petugas_jabatan' => htmlspecialchars($key->jabatan),
                'no' => $no,
            ];
            $no++;
        }
        $templateProcessor->cloneBlock('loop_petugas', 0, true, false, $detail_array);
        
        #jika terdapat beberapa tahap spt diklat
        if($data['tahap'] != "") {
            $detail_tahap = [];
            $no_tahap = 1;
            foreach ($data['tahap'] as $key) {
                $detail_tahap[] = [
                    'waktu' => $key->waktu,
                    'tempat' => $key->tempat,
                    'no' => $no_tahap,
                ];
                $no_tahap++;
            }
            $templateProcessor->cloneBlock('loop_tahap', 0, true, false, $detail_tahap);
        }

        #jika ada menimbang
        if(count($data['dasar_menimbang']) > 1) { $sort_menimbang = ['a.','b.','c.','d.','e.','f.','g.','h.','i.','j.']; } else { $sort_menimbang = [""];}
        if(array_reverse($data['dasar_menimbang']) != "") {
            $menimbang = [];
            $no = 0;
            foreach ($data['dasar_menimbang'] as $men) {
                $menimbang[] = [
                    'ket_menimbang' => $men->keterangan,
                    'ke_m' => $sort_menimbang[$no++],
                ];
            }
            $templateProcessor->cloneBlock('loop_menimbang', 0, true, false, $menimbang);
        }

        #jika ada dasar hukum
        if(array_reverse($data['dasar_hukum']) != "") {
            $hukum = [];
            $no = 1;
            foreach ($data['dasar_hukum'] as $huk) {
                $hukum[] = [
                    'ket_hukum' => $huk->keterangan,
                    'ke_h' => (count($data['dasar_hukum']) > 1) ? $no++.'.' : '',
                ];
            }
            $templateProcessor->cloneBlock('loop_hukum', 0, true, false, $hukum);
        }

        
        $templateProcessor->setValues($data['data']);
        header("Content-Disposition: attachment; filename=".$data['filename']);
        $templateProcessor->saveAs('php://output');
    }


    public function izin($data) {
        require_once 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('public/report/'.$data['source']);

        $templateProcessor->setValues($data['data']);
        header("Content-Disposition: attachment; filename=".$data['filename']);
        $templateProcessor->saveAs('php://output');
    }

    public function sppd($data) {
        require_once 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('public/report/'.$data['source']);
        $templateProcessor->setValues((array) $data['data']);
        header("Content-Disposition: attachment; filename=".$data['filename']);
        $templateProcessor->saveAs('php://output');
    }
   
}


