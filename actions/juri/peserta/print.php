<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->single('participants',[
    'id' => $_GET['id']
]);

$valuation   = $db->single('valuations',[
    'participant_id' => $participant->id,
]);

return view('juri/peserta/print',['participant' => $participant,'valuation'=>$valuation]);