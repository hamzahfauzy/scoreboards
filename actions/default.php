<?php
$conn = get_connection();
$db   = new src\Database($conn);

if(isset($_GET['realtime-request']))
{
    
    $participant = $db->single('participants',[
        'status' => 'selesai'
    ]);
    if($participant)
    {
        $db->update('participants',[
            'status' => 'tampil'
        ],[
            'id' => $participant->id
        ]);
    }

    return $participant;
}

if(isset($_GET['update-view']))
{
    $db->update('participants',[
        'status' => 'finish'
    ],[
        'id' => $_GET['id']
    ]);
}

return view('default/index');