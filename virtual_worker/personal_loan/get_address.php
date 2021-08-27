<?php
$pincode = $_POST['pincode'];
$data    = file_get_contents('https://api.postalpincode.in/pincode/' . $pincode);
$data    = json_decode($data);
if (isset($data[0]->PostOffice[0])) {
    $arr['district'] = $data[0]->PostOffice[0]->District;
    $arr['city']    = $data[0]->PostOffice[0]->Region;
    $arr['state']   = $data[0]->PostOffice[0]->State;
    $arr['country'] = $data[0]->PostOffice[0]->Country;
    echo json_encode($arr);
} //isset($data[0]->PostOffice[0])
else {
    echo 'nill';
}
?>
