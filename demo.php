<?php


$USERID=$_POST['USERID'];
$ACTION=$_POST['ACTION'];
$DATAFILE=$_POST['DATAFILE'];
$OUTPUT_DIR="./imgs/";
$MODULE="./modules/vtkVisualization";
$DISPLAY=":0";


$OUTPUT_FILE_NAME=$OUTPUT_DIR."/".$USERID.".jpg";


if ($ACTION === "VTKRender") {
    shell_exec("DISPLAY=$DISPLAY $MODULE -i $DATAFILE -s 800x800 -o $OUTPUT_FILE_NAME");
    $TODISPLAY = fopen($OUTPUT_FILE_NAME,'r');
    $BYTEARR = fread($TODISPLAY, filesize($OUTPUT_FILE_NAME));
    $BYTEARR = base64_encode($BYTEARR);
    echo $BYTEARR;
    fclose($TODISPLAY);

} elseif ($ACTION === "RotationDemo") {
    shell_exec("DISPLAY=$DISPLAY $MODULE $MODULE -i $DATAFILE -s 800x800 -o $OUTPUT_FILE_NAME -a 20 -e 20 -c ./camera.txt");
    $TODISPLAY = fopen($OUTPUT_FILE_NAME,'r');
    $BYTEARR = fread($TODISPLAY, filesize($OUTPUT_FILE_NAME));
    $BYTEARR = base64_encode($BYTEARR);
    echo $BYTEARR;
    fclose($TODISPLAY);
} elseif ($ACTION === "TranslationDemo") {
    shell_exec("DISPLAY=$DISPLAY $MODULE $MODULE $MODULE -i $DATAFILE -s 800x800 -o $OUTPUT_FILE_NAME -t 10,10 -c ./camera.txt");
    $TODISPLAY = fopen($OUTPUT_FILE_NAME,'r');
    $BYTEARR = fread($TODISPLAY, filesize($OUTPUT_FILE_NAME));
    $BYTEARR = base64_encode($BYTEARR);
    echo $BYTEARR;
    fclose($TODISPLAY);
} elseif ($ACTION === "ZoomingDemo") {
    shell_exec("DISPLAY=$DISPLAY $MODULE $MODULE $MODULE -i $DATAFILE -s 800x800 -o $OUTPUT_FILE_NAME -z 1.1 -c ./camera.txt");
    $TODISPLAY = fopen($OUTPUT_FILE_NAME,'r');
    $BYTEARR = fread($TODISPLAY, filesize($OUTPUT_FILE_NAME));
    $BYTEARR = base64_encode($BYTEARR);
    echo $BYTEARR;
    fclose($TODISPLAY);
}


?>