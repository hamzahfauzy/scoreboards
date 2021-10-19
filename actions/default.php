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
        $category = $db->single('categories',[
            'id' => $participant->category_id
        ]);
        $db->update('participants',[
            'status' => 'tampil'
        ],[
            'id' => $participant->id
        ]);
        
        $participant->category = $category;
        $predikat = 'Perunggu';
        if($participant->total_score >= 65 && $participant->total_score <= 79.99)
            $predikat = 'Perak';
    
        if($participant->total_score >= 80)
            $predikat = 'Emas';
    
        $participant->predikat = $predikat;
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