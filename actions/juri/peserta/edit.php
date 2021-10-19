<?php
$id = $_GET['id'];
$user = session()->get('user');
$conn    = get_connection();
$db      = new src\Database($conn);
$valuation   = $db->single('valuations',[
    'id'   => $id,
]);

$participant   = $db->single('participants',[
    'id' => $valuation->participant_id,
]);

// if($check)
//     return redirect()->route('juri/peserta')->withMessage('fail','Restricted area!');

if(request()->isMethod('POST'))
{
    $request = request()->post();
    $total_score = 0;
    foreach($request->score as $score)
        $total_score += $score;

    $total_score /= session()->get('juri');

    $valuations    = $db->update('valuations',[
        'user_id'   => $user->id,
        'score'     => $total_score,
        'score_serialize' => serialize($request->score),
        'participant_id' => $valuation->participant_id,
    ],[
        'id' => $id
    ]);

    if($valuations)
    {
        $db->update('participants',[
            'total_score' => $total_score,
            'status'      => 'tampil'
            // 'status'      => 'selesai'
        ],[
            'id' => $valuation->participant_id,
        ]);

        return redirect()->route('juri/peserta')->withMessage('success','Nilai Peserta berhasil diupdate!');
    }
    return redirect()->route('juri/peserta')->withMessage('fail','Nilai Peserta gagal diupdate!');
}

return view('juri/peserta/edit',[
    'participant' => $participant
]);