<?php

class Jollygood extends CI_Model {

    function simpan_data($data, $table){
        $this->db->insert($table, $data);
        return true;
    }

    function kueri($query){
        return $this->db->query($query);
    }
    
    function insertbatch($table,$insert) {
         $this->db->insert_batch($table,$insert);
         return true;
    }

    function list_data_all($table){
         return $query = $this->db->get($table)->result();  
    }

    function cek_login($where){      
        return $this->db->get_where('01_siswa',$where);
    }

    function list_data_where($param_id, $id, $table){
       return $this->db->get_where($table, array($param_id => $id));
    }

    function count($table){
        return $query = $this->db->get($table);
    }
    
    function hapus($param_id, $id, $table){
        $this->db->delete($table, array($param_id => $id)); 
        return true;
    }
    
    function ambil($param_id, $id, $table){
       return $this->db->get_where($table, array($param_id => $id));
    }

    function ambil_new($param, $table){
        return $this->db->get_where($table, $param);
    }
    
    function update($param_id, $id,$data, $table){       
        $this->db->where($param_id, $id);
        $this->db->update($table, $data); 
        return true;
    }

    function usercreated(){
        $createdby=$this->session->userdata('userNama');
        return $createdby;
    }

    function list_join($table1, $table2, $param1){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $param1);
        return $query = $this->db->get()->result();
    }
   
    function list_join_where($table1, $table2, $param1, $mode='', $key='', $db=''){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $param1, $mode);
        if($key!=''){            
            $this->db->where($key);
        }
        return $query = $this->db->get();
    }

    function listpendaftaran(){
        $this->db->select('*')->from('03_pendaftaran')->join('01_siswa','03_pendaftaran.kodesiswa=01_siswa.kodesiswa')->join('02_kelas','03_pendaftaran.kodekelas=02_kelas.kodekelas')->order_by('kodependaftaran','desc');
        return $query =$this->db->get()->result();
    }

    function listpendaftaran2($where){
        $this->db->select('*')->from('03_pendaftaran')->join('01_siswa','03_pendaftaran.kodesiswa=01_siswa.kodesiswa')->join('02_kelas','03_pendaftaran.kodekelas=02_kelas.kodekelas')->where($where);
        return $query =$this->db->get();
    }

    function listpembayaran2($where){
        $this->db->select('*')->from('04_pembayaran')->join('03_pendaftaran','04_pembayaran.kodependaftaran=03_pendaftaran.kodependaftaran')->join('01_siswa','04_pembayaran.kodesiswa=01_siswa.kodesiswa')->join('02_kelas','03_pendaftaran.kodekelas=02_kelas.kodekelas')->where($where);
        return $query =$this->db->get();  
    }

    function listpendapatan($where){
        $this->db->select('*')->from('05_pendapatan')->join('03_pendaftaran','04_pembayaran.kodependaftaran=03_pendaftaran.kodependaftaran')->join('01_siswa','04_pembayaran.kodesiswa=01_siswa.kodesiswa')->join('02_kelas','03_pendaftaran.kodekelas=02_kelas.kodekelas')->where($where);
        return $query =$this->db->get();  
    }

    function listpendapatan2($d,$h){
        $query="SELECT CONCAT(MONTH(a1.tanggal),'/',YEAR(a1.tanggal))AS bulangabung,MONTH(a1.tanggal) AS bulan,YEAR(a1.tanggal) AS tahun,(SELECT sum(jumlah) FROM 05_pendapatan a2 WHERE a2.keterangan='0' AND CONCAT(MONTH(a2.tanggal),'/',YEAR(a2.tanggal))=CONCAT(MONTH(a1.tanggal),'/',YEAR(a1.tanggal)) GROUP BY CONCAT(MONTH(a2.tanggal),'/',YEAR(a2.tanggal)))AS pendaftaran,(SELECT sum(jumlah) FROM 05_pendapatan a3 WHERE keterangan='1' AND CONCAT(MONTH(a3.tanggal),'/',YEAR(a3.tanggal))=CONCAT(MONTH(a1.tanggal),'/',YEAR(a1.tanggal))GROUP BY CONCAT(MONTH(a3.tanggal),'/',YEAR(a3.tanggal))) AS spp FROM 05_pendapatan a1 WHERE tanggal BETWEEN '$d' AND '$h' GROUP BY CONCAT(MONTH(a1.tanggal),'/',YEAR(a1.tanggal))";
       return $this->db->query($query);
    }

    function listpembayaran3(){
        $this->db->select('*')->from('04_pembayaran')->join('03_pendaftaran','04_pembayaran.kodependaftaran=03_pendaftaran.kodependaftaran')->join('01_siswa','04_pembayaran.kodesiswa=01_siswa.kodesiswa')->join('02_kelas','03_pendaftaran.kodekelas=02_kelas.kodekelas');
        return $query =$this->db->get();  
    }

    function listsiswabsdaftar(){
        $this->db->select('*')->from('01_siswa')->where(array('statusdaftar'=>'1','statusaktif'=>'1'));
        return $query =$this->db->get()->result();
    }

    function listkelasaktif(){
        $tglskr=date('Y-m-d');
        $this->db->select('*')->from('02_kelas')->where(array('tglbuka<='=>$tglskr,'tgltutup>='=>$tglskr));
        return $query =$this->db->get()->result();
    }

    function listtagihan(){
        $this->db->select('*')->from('04_pembayaran')->join('03_pendaftaran','04_pembayaran.kodependaftaran=03_pendaftaran.kodependaftaran')->join('01_siswa','03_pendaftaran.kodesiswa=01_siswa.kodesiswa')->join('02_kelas','03_pendaftaran.kodekelas=02_kelas.kodekelas')->where(array('status'=>'0'));
        return $query =$this->db->get()->result();
    }

    function kodesiswa(){
        //JS-0000001
        $this->db->select('Right(kodesiswa,7) as kode',false);
        
        $this->db->order_by('kodesiswa','desc');
        $this->db->limit(1);
        $query = $this->db->get('01_siswa');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,7,"0",STR_PAD_LEFT);
        $kodejadi  = "JS-".$kodemax;
        return $kodejadi;
    }

    function kodekelas(){
        //JK-0000
        $this->db->select('Right(kodekelas,7) as kode',false);
        
        $this->db->order_by('kodekelas','desc');
        $this->db->limit(1);
        $query = $this->db->get('02_kelas');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,7,"0",STR_PAD_LEFT);
        $kodejadi  = "JK-".$kodemax;
        return $kodejadi;
    }
    
    function kodependaftaran(){
        //JD-0718-0001
        $this->db->select('Right(kodependaftaran,4) as kode',false);
        
        $this->db->order_by('kodependaftaran','desc');
        $this->db->limit(1);
        $query = $this->db->get('03_pendaftaran');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "JD-".date('mY').$kodemax;
        return $kodejadi;
    }

    function kodebayar(){
        //JD-0718-0001
        $this->db->select('Right(kodebayar,4) as kode',false);
        
        $this->db->order_by('kodebayar','desc');
        $this->db->limit(1);
        $query = $this->db->get('04_pembayaran');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "JB-".date('mY').$kodemax;
        return $kodejadi;
    }


    public function terbilang ($angka) {
        $angka = (float)$angka;
        $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');
        if ($angka < 12) {
            return $bilangan[$angka];
        } else if ($angka < 20) {
            return $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) { return sprintf('Seratus %s', $this->terbilang($angka - 100));
        } else if ($angka < 1000) { $hasil_bagi = (int)($angka / 100); $hasil_mod = $angka % 100; return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], $this->terbilang($hasil_mod)));
        } else if ($angka < 2000) { return trim(sprintf('Seribu %s', $this->terbilang($angka - 1000)));
        } else if ($angka < 1000000) { $hasil_bagi = (int)($angka / 1000); $hasil_mod = $angka % 1000; return sprintf('%s Ribu %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod));
        } else if ($angka < 1000000000) { $hasil_bagi = (int)($angka / 1000000); $hasil_mod = $angka % 1000000; return trim(sprintf('%s Juta %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000) { $hasil_bagi = (int)($angka / 1000000000); $hasil_mod = fmod($angka, 1000000000); return trim(sprintf('%s Milyar %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000000) { $hasil_bagi = $angka / 1000000000000; $hasil_mod = fmod($angka, 1000000000000); return trim(sprintf('%s Triliun %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else {
            return 'Data Salah';
        }
    }    
}