

<?php
    include 'db/db_config.php';
    extract($_POST);
    session_start();
    // error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php');
    }
    // ob_start(); 

  
    function tampil_bulan ($x) {
        $bulan = array (1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',
                 5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',
                 9=>'September',10=>'Oktober',11=>'November',12=>'Desember');
        return $bulan[$x];
    }

    require_once('tcpdf/tcpdf.php');

    class MYPDF extends TCPDF {

        //Page header
        public function Header() {
            // Logo
            if ($this->page == 1) {
            $image_file = K_PATH_IMAGES.'tcpdf_logo.jpg';
            $this->Image($image_file, 17, 4, 25, 25, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $html = '<strong><font size="18">PD. SUBUR BARU JAMBI</font></strong><br/><br/>
            Jalan Berdikari Rt. 23 No. 13 Kel. Payo Selincah Kec. Paal Merah Kota Jambi
            <br/>
            ';
            $this->writeHTMLCell(
                $w=0,
                $h=0,
                $x=45,
                $y=7,
                $html,
                $border=0,
                $ln=0,
                $fill=false,
                $reseth=true,
                $align='L'
            );

                $html = '
                <hr>
                <br>
                <table>
                <tr>
                <td align="center" style="font-size: 15px;">Laporan Data Penilaian</td>
                </tr>
                </table>
                <table>
                <tr>
                <td></td>
                </tr>
                </table>
            ';
            $this->writeHTMLCell(
                $w=0,
                $h=0,
                $x=15,
                $y=33,
                $html,
                $border=0,
                $ln=0,
                $fill=false,
                $reseth=true,
                $align=''
            );
        }
        }
    
        public function lastPage($resetmargins=false) {
            $this->setPage($this->getNumPages(), $resetmargins);
            $this->isLastPage = true;
        }

        // Page footer
        public function Footer() {

             if($this->isLastPage) { 
                $tgl = date("d F Y");
                // $this->SetY(-55);
                $html = '<font size="10">Jambi, '.$tgl.' <br/><br/> <br/><br/>
                '.$_SESSION['nama'].'<font>
                <br/>';
                $this->writeHTMLCell(
                    $w=0,
                    $h=0,
                    $x=0,
                    $y=-40,
                    $html,
                    $border=0,
                    $ln=0,
                    $fill=false,
                    $reseth=true,
                    $align='R'
                );   
             }
            // Position at 15 mm from bottom
            $this->SetY(-15);

            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// data header
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
 

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->SetFont('times','',10);
// add a page
$pdf->AddPage('L');

$htmlTable =
'
<table border="1" cellpadding="4" >
<thead>
    <tr>
        <td>Hasil </td>';
        $no = 1; 
        foreach ($db->select('kriteria','kriteria')->get() as $th):
            $htmlTable .= '<td>'.$th['kriteria'].' (K';
            $htmlTable .= $no;
        $htmlTable .= ')</td>';
        $no++; 
        endforeach ;
        $htmlTable .= '<td rowspan="2">Hasil</td>
        <td rowspan="2">Ranking</td>
    </tr>
    <tr>
    <td>Bobot </td>';
    foreach ($db->select('bobot','kriteria')->get() as $th):
        $htmlTable .='<td>';
        $htmlTable .= number_format($th['bobot'],2);
    $htmlTable .='</td>';
    endforeach;
    $htmlTable .='</tr>
    </thead>
    <tbody>';
        
    $no = 1;
  
    foreach ($db->select('distinct(karyawan.nama),hasil_tpa.*,hasil_spk.*','karyawan,hasil_tpa,hasil_spk')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr and karyawan.id_calon_kr=hasil_spk.id_calon_kr and hasil_spk.minggu='.$minggu.' and hasil_spk.bulan='.$bulan.' and hasil_spk.tahun='.$tahun.'')->order_by('hasil_spk.hasil_spk','desc')->get() as $data):
     
        
        $htmlTable .='<tr>';
        $htmlTable .='<td>';
        $htmlTable .=$data['nama'];
        $htmlTable .='</td>';
        foreach ($db->select('kriteria','kriteria')->get() as $td):
            $htmlTable .='<td>';
            $htmlTable .=number_format($db->rumus($db->getnilaisubkriteria($data[$td['kriteria']]),$td['kriteria']),2);
        $htmlTable .='</td>';
        endforeach;
        $htmlTable .='<td>  ';  
            $hasil = [];
            foreach($db->select('kriteria','kriteria')->get() as $dt){
                array_push($hasil,$db->rumus($db->getnilaisubkriteria($data[$dt['kriteria']]),$dt['kriteria'])*$db->bobot($dt['kriteria']));
            }
            $htmlTable .= $r = number_format(array_sum($hasil),2);     
            $htmlTable .='</td>
        <td>';
        $htmlTable .=$no;
        $htmlTable .='</td>
    </tr>';

    $no++;
    endforeach;  
   
    $htmlTable .='</tbody>
    </table>';

$pdf->writeHTML($htmlTable, true, false, true, false, '');
// $pdf->writeHTML($htmlTable, true, 0, true, 0);
// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('lap_Penilaian_Karyawan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
