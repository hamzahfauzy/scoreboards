<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->updateall('participants',[
    'status'      => "Menunggu",
    'total_score' => NULL
]);
$valuations = $db->truncate('valuations');

return redirect()->route('admin/scoreboards')->withMessage('success','Records Clean!');

