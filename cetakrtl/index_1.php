<?php
if (isset($_GET['nourut'])){
    $id = $_GET['nourut'];
    include "../plugins/config.php";
    include '../plugins/fpdf/fpdf.php';

    $query="SELECT *, (SELECT nama FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id."')) AS nama, (SELECT jabatan FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id."')) AS jabatan, (SELECT skpd FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id."')) AS skpd FROM inovasi WHERE id='".$id."'";
    $result = mysqli_query($con,$query);
    
  

    /**
     * @author Achmad Solichin
     * @website http://achmatim.net
     * @email achmatim@gmail.com
     */
class FPDF_AutoWrapTable extends FPDF {
  	private $data = array();
  	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'F4',
  		'orientation'=>'P'
  	);

  	function __construct($data = array(), $options = array()) {
    	parent::__construct();
    	$this->data = $data;
    	$this->options = $options;
	}

	public function rptDetailData ($dataproper) {
		//
		$border = 0;
		$this->AddPage();
		$this->SetAutoPageBreak(true,60);
		$this->AliasNbPages();
		$left = 25;

		//tampilkan judul
		$this->SetFont("", "B", 15);
		$this->MultiCell(0, 12, $dataproper[0]);
		$this->Cell(0, 1, " ", "B");
		$this->Ln(10);
		$this->SetFont("", "B", 12);
		$this->SetX($left); $this->Cell(0, 10, 'LAPORAN DATA KARYAWAN', 0, 1,'C');
		$this->Ln(10);


		$h = 13;
		$left = 40;
		$top = 80;	
		#tableheader
		$this->SetFillColor(200,200,200);	
		$left = $this->GetX();
		$this->Cell(20,$h,'NO',1,0,'L',true);
		$this->SetX($left += 20); $this->Cell(75, $h, 'NIP', 1, 0, 'C',true);
		$this->SetX($left += 75); $this->Cell(100, $h, 'NAMA', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(150, $h, 'ALAMAT', 1, 0, 'C',true);
		$this->SetX($left += 150); $this->Cell(100, $h, 'EMAIL', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'WEBSITE', 1, 1, 'C',true);
		//$this->Ln(20);
		
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(20,75,100,150,100,100));
		$this->SetAligns(array('C','L','L','L','L','L'));
		$no = 1; $this->SetFillColor(255);
		foreach ($this->data as $baris) {
			$this->Row(
				array($no++, 
				$baris['nip'], 
				$baris['nama'], 
				$baris['alamat'], 
				$baris['email'], 
				$baris['website']
			));
		}
			

	}

	public function printPDF ($dataproper) {

		if ($this->options['paper_size'] == "F4") {
			$a = 8.3 * 72; //1 inch = 72 pt
			$b = 13.0 * 72;
			$this->FPDF($this->options['orientation'], "pt", array($a,$b));
		} else {
			$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
		}

	    $this->SetAutoPageBreak(false);
	    $this->AliasNbPages();
	    $this->SetFont("helvetica", "B", 10);
	    //$this->AddPage();
	
	    $this->rptDetailData($dataproper);
			    
	    $this->Output($this->options['filename'],$this->options['destinationfile']);
  	}
  	
  	
  	
  	private $widths;
	private $aligns;

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}

	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=10*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,10,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
} //end of class

//contoh penggunaan
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $judul =$row['judul'];
    } 
$data = array(
	array(
		'nip'		=> '0111500382',
		'nama' 		=> 'ACHMAD SOLICHIN',
		'alamat' 	=> 'Jalan Ciledug Raya No 99, Petukangan Utara, Jakarta Selatan 12260, DKI Jakarta',
		'email' 	=> 'achmatim@gmail.com',
		'website' 	=> 'http://achmatim.net'
	),
	array(
		'nip'		=> '0411500101',
		'nama' 		=> 'CHOTIMATUL MUSYAROFAH',
		'alamat' 	=> 'Komplek Japos RT 002/015 Kelurahan Peninggilan, Kec. Ciledug, Tangerang',
		'email' 	=> 'chotimatul.musyarofah@gmail.com',
		'website' 	=> 'http://contohprogram.info'
	),
	array(
		'nip'		=> '1111500200',
		'nama' 		=> 'MUHAMMAD LINTANG',
		'alamat' 	=> 'Jl. Raya Caplin, Kec. Ciledug, Tangerang, Banten',
		'email' 	=> 'achmatim@yahoo.com',
		'website' 	=> 'http://ebook.achmatim.net'
	)
);

//pilihan
$options = array(
	'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
	'destinationfile' => '', //I=inline browser (default), F=local file, D=download
	'paper_size'=>'F4',	//paper size: F4, A3, A4, A5, Letter, Legal
	'orientation'=>'P' //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF(array($judul));
}
else{
    echo '<h4>Oops, sepertinya terjadi kesalahan. Silahkan tutup jendela ini dan klik tombol "print" lagi pada Tabel Display.</h4>';
}
?>