<?php
$id = $_GET['id'];
$user = session()->get('user');
$conn    = get_connection();
$db      = new src\Database($conn);
$check   = $db->single('valuations',[
    'user_id'   => $user->id,
    'participant_id' => $id,
]);

$participant   = $db->single('participants',[
    'id' => $id,
]);

if($check)
    return redirect()->route('juri/peserta')->withMessage('fail','Restricted area!');

if(request()->isMethod('POST'))
{
    $request = request()->post();
    $valuations    = $db->insert('valuations',[
        'user_id'   => $user->id,
        'score'     => $request->score,
        'participant_id' => $id,
    ]);

    if($valuations)
    {
        $db->update('participants',[
            'total_score' => $participant->total_score+$request->score
        ],[
            'id' => $id
        ]);

        // check all valuations
        $valuations_all = $db->all('valuations',[
            'participant_id' => $id
        ]);

        $juri_all = $db->all('users',[
            'level' => 'juri'
        ]);

        if(count($valuations_all) == count($juri_all))
        {
            $db->update('participants',[
                'status' => 'selesai'
            ],[
                'id' => $id
            ]);
        }
        return redirect()->route('juri/peserta')->withMessage('success','Peserta berhasil dinilai!');
    }
    return redirect()->route('juri/peserta')->withMessage('fail','Peserta gagal dinilai!');
}

return view('juri/peserta/nilai',[
    'participant' => $participant
]);