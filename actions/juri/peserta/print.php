<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->single('participants',[
    'id' => $_GET['id']
]);

return view('juri/peserta/print',['participant' => $participant]);