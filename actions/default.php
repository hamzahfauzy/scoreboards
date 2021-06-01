<?php
if(isset($_GET['realtime-request']))
{
    $conn = get_connection();
    $db   = new src\Database($conn);
    
    $participants = $db->all('participants',[],[
        'total_score' => 'DESC',
        'order_number' => 'ASC'
    ]);

    return $participants;
}

return view('default/index');