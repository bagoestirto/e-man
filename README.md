# CodeIgniter 4 Application Starter

Akhirnya iso, Alhamdulillah

Untuk login

- Tambahkan Auth.php pada app\Filters\
- Tambahkan pada app\config\filters.php
  pada bagian public $aliases

Untuk pdf (dompdf)

- composer require dompdf\dompdf
- tambahkan pada file app\autoload.php public $psr4 = ['Dompdf' => APPPATH . 'ThirdParty/dompdf/src',

Untuk FPDF

- download paket FPDF
- copy file ke \app\ThirdParty\
- Tambahkan(
  namespace App\ThirdParty;
  di file fpdf.php)
- Tambahkan{
  use App\ThirdParty\FPDF;
  di controller}
