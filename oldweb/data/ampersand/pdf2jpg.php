<pre>

<?php

if (isset($_GET['pdf_name'])) {
    echo $_GET['pdf_name'];
    $pdf_name = $_GET['pdf_name'];
} else {

    echo "no parameter" ;
    // Fallback behaviour goes here
}


if ( isset( $pdf_name) ) {
    $my_path = "/website/vnn.mac.in.th/data/files/";
    $my_pdf = $my_path . $pdf_name ;
    $my_jpg = $my_path . $pdf_name . '.jpg' ;
    // echo $my_pdf,'\n', $my_jpg , '\n';


    $imagick = new Imagick();
    $imagick->setResolution(200, 200);
    imageantialias($imagick,true) ;
    $imagick->readImage($my_pdf);
    $imagick->writeImages($my_jpg, false);
}
echo "generated graphic, take you back to program";
header("Refresh:5; url=../placardpdf_list.php");


?>


    </pre>